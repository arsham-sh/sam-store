<?php

namespace App\Http\Controllers;

use App\Helpers\Cart\Cart;
use App\Models\Payment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payment()
    {
        // return 'order';
        $cart = Cart::instance('cart-shop');
        $cartItems = $cart->all();
        if ($cartItems->count()) {
            $price = $cartItems->sum(function ($cart) {
                return $cart['product']->price * $cart['quantity'];
            });

            $orderitems = $cartItems->mapWithKeys(function ($cart) {
                return [$cart['product']->id => ['quantity' => $cart['quantity']]];
            });

            $order = \auth()->user()->orders()->create([
                'status' => 'unpaid',
                'price' => $price,
            ]);
            $order->products()->attach($orderitems);

            $token = \config('services.payping.token');

            $args_number = Str::random(16);

            $args = [
                // "amount" => $price,
                "amount" => 1000,
                "payerName" => \auth()->user()->name,
                "returnUrl" => route('payment.callback'),
                "clientRefId" => $args_number,
            ];

            $payment = new \PayPing\Payment($token);

            try {
                $payment->pay($args);
            } catch (Exception $e) {
                throw $e;
            }

            $order->payments()->create([
                'resnumber' => $args_number,
                'price' => $price
            ]);

            $cart->flush();

            return \redirect($payment->getPayUrl());
        }
        return \back();
    }


    public function callback(Request $request)
    {
        $token = \config('services.payping.token');

        $payment = Payment::where('resnumber', $request->clientrefid)->firstOrFail();

        $payping = new \PayPing\Payment($token);

        try {
            // $payment->price 
            if ($payping->verify($request->refid, 1000)) {

                $payment->update([
                    'status' => 1
                ]);

                $payment->order()->update([
                    'status' => 'paid',
                ]);

                alert()->success('پرداخت با موفقیت انجام شد');
                return \redirect('/products');
            } else {
                alert()->error('پرداخت تایید نشد');
                return \redirect('/products');
            }
        } catch (Exception $e) {
            $errors = \collect(\json_decode($e->getMessage(), \true));
            alert()->error($errors->first());
            return \redirect('/products');
        }
    }
}
