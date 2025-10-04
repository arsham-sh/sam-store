<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('status' , \request('type'))->latest()->paginate(20);
        return \view('panel.orders.orders' , \compact('orders'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $products = $order->products()->paginate(20);
        return \view('panel.orders.details' , \compact('products'));
    }

    public function payments(Order $order)
    {
        $payments = $order->payments()->latest()->paginate(20);
        return \view('panel.orders.payments' , \compact('payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return \view('panel.orders.edit' , \compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $date = $this->validate($request, [
            'status' => ['required' , Rule::in(['unpaid' , 'paid' , 'preperation' , 'post' , 'received' , 'canceled'])],
            'tracking_serial' => 'required'
        ]);

        $order->update($date);
        \alert()->success('با تشکر' , 'سفارش مورد نظر ویرایش شد');
        return \redirect()->route('orders.index',['type' => $order->status]);
    }
}
