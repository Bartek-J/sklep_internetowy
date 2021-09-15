<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $ships = Shipping::active()->get();
        return view('shippings', compact('ships'));
    }
    public function show($shipping_id)
    {
        $shipping = Shipping::findOrFail($shipping_id);
        return view('ShipShow', compact('shipping'));
    }
    public function update(ShippingRequest $request, $shipping_id)
    {
       
        $ship = Shipping::findOrFail($shipping_id);
        $ship -> name = $request->input('nazwa');
        $ship -> price = $request->input('price');
        $ship -> ZaPobraniem = $request->input('ZaPobraniem');
        $ship -> save();
        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Pomyślnie zmodyfikano']
        ]);
    }
    public function delete($shipping_id)
    {
        $shipping = Shipping::findOrFail($shipping_id);
        $shipping -> active = 'no';
        $shipping -> save();
        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Usunięto metodę dostawy']
        ]);
    }
    public function new()
    {
        return view('ShipNew');
    }
    public function create(ShippingRequest $request)
    {
        
        $shipping = new Shipping;
        $shipping -> name = $request->input('nazwa');
        $shipping -> price = $request->input('price');
        $shipping -> ZaPobraniem = $request->input('ZaPobraniem');
        $shipping -> save();

        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Utworzona nową metodę dostawy']
        ]);            
    }
}
