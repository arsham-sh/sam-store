<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use function Symfony\Component\String\b;

class ProfileController extends Controller
{
    public function index()
    {
        return \view('profile.profile');
    }

    public function edit(User $user)
    {
        return \view('profile.edit', \compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);


        if (! \is_null($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        \alert()->success('با تشکر', 'ویرایش با موفقیت انجام شد');
        return \redirect()->route('profile');
    }

    public function order()
    {
        $orders = \auth()->user()->orders()->paginate(15);
        return \view('profile.order-list', \compact('orders'));
    }

    public function showDetails(Order $order)
    {
        return \view('profile.order-detail' , \compact('order'));
    }


    public function payment(Order $order)
    {
        if($order->status == 'unpaid')
        {
            $price = $order->price;

            
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

                return \redirect($payment->getPayUrl());
        }

        return \back();
    }
}