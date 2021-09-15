<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Redirect;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\NewOrder;
use App\Http\Requests\ShippingRequest;
use App\Mail\PotwierdzenieZamowienia;
use App\Shipping;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
    }
 
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->with('products','dostawy')->get(); 
        return view('zamowieniaStatus', compact('orders'));
    }

    public function store(NewOrder $request)
    {
        if(!Auth::guest())
        {
        $user_id = auth()->user()->id;
        }
        else
        {
            $user_id = 0;
        }
       
        $cart = \Cart::getContent();
        $total = \Cart::getTotal();
        if($total>0)
        {
        $dostawa = $request->input('delieveryMethod');
        $shipping = Shipping::findOrFail($dostawa);
        if($total < 20000)
        {
            $total = $total + ($shipping->price*100);
        }

        $order = new Order;
        $order -> user_id = $user_id;
        $order -> email = $request->input('email');
        $order -> price = $total;
        $order -> name = $request->input('Name');
        $order -> secondname = $request->input('SurName');
        $order -> street = $request->input('recipientStreet');
        $order -> city = $request->input('recipientCity');
        $order -> postalcode = $request->input('recipientPostalCode');
        $order -> phonenumber = $request->input('recipientPhoneNumber');
        $order -> comment = $request->input('comment');
        $order -> shipping_id = $dostawa;
        $order -> save();
         foreach($cart as $item)
         {
             
        $order->products()->create([ 'product_id' => $item->id, 'quantity' => $item->quantity , 'format' => $item->attributes->format ]);

         }
         \Cart::clear();
        \Cart::clearCartConditions();

         Mail::to($request->input('email') )->send(new PotwierdzenieZamowienia($order,$cart));
        }
        return Redirect::to('/Koszyk')->with([
            'status' => [
                'type' => 'success',
                'content' => 'Zamówienie zostało złożone pomyślnie'
            ]
        ]);
        
    }
    public function daneOsobowe()
    {
        $shippings = Shipping::active()->get();
        $condition = \Cart::getConditions();
        $conds = null;
        foreach ($condition as $condition1) {
            $conds = $condition1->getAttributes();
            $conds = $conds['code'];
        }
        $cart = \Cart::getContent();
        $total = round(\Cart::getTotal() / 100,2);
        $numberofprods=\Cart::getTotalQuantity();
        return view('daneOsobowe',compact('cart','total','numberofprods','condition','conds','shippings'));
    }
}
