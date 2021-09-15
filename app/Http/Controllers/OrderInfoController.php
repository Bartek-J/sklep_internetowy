<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shipping;
use Illuminate\Http\Request;

class OrderInfoController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('orderAll', compact('orders'));
    }
    public function show($order_id)
    {
        $order = Order::with('products','dostawy')->findOrFail($order_id);
        return view('orderShow', compact('order'));
    }
    public function update($order_id, Request $request)      
    {
       $order = Order::findOrFail($order_id);
       $order -> status = $request->input('status');
       $order->save();
       return back()->with([
           'status' => [
               'type' => 'success',
               'content' => 'Zmieniono status'
           ]
       ]);
    }
}
