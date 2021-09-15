<?php

namespace App\Http\Controllers;

use App\coupon;
use App\ProductPhoto;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;


class KoszykController extends Controller
{
    public function index()
    {
        $condition = \Cart::getConditions();
        $conds = null;
        foreach ($condition as $condition1) {
            $conds = $condition1->getAttributes();
            $conds = $conds['code'];
        }
        $cart = \Cart::getContent()->sortBy('id');
        $total = round(\Cart::getTotal() / 100, 2);
        $numberofprods = \Cart::getTotalQuantity();
        return view('koszyk', compact('cart', 'total', 'numberofprods', 'condition', 'conds'));
    }
    public function delete($id)
    {
        \Cart::remove($id);
        return back()->with([
            'status' => [
                'type' => 'info',
                'content' => 'Usunięto produkt z koszyka'
            ]
        ]);;
    }
    public function zwieksz($id)
    {
        \Cart::update($id, array(
            'quantity' => +1,
        ));
        return back();
    }
    public function odejmij($id)
    {
        \Cart::update($id, array(
            'quantity' => -1,
        ));
        return back();
    }
    public function rabat(Request $request)
    {
        $coupon = coupon::where('name', $request->input('coupon'))->first();

        if (isset($coupon->id)) {
            if ((date("Y-m-d") <= $coupon->expires_at) && ($coupon->quantity > 0)) {
                $conditionis = \Cart::getConditions();
                if ($conditionis->count() > 0) {
                    return back()->with([
                        'status' => [
                            'type' => 'danger',
                            'content' => 'Już posiadasz kod rabatowy'
                        ]
                    ]);;
                } else {

                    $discount = (-1) * $coupon->discount;
                    if ($coupon->type == 'procent') {
                        $discount = $discount . "%";
                    }
                    if ($coupon->category == 'all') {
                        $condition = new \Darryldecode\Cart\CartCondition(array(
                            'name' => $coupon->name,
                            'type' => 'promo',
                            'target' => 'total',
                            'value' => $discount,
                            'attributes' => array('code' => $coupon->name, 'znizka' => $discount , 'category' => $coupon->category )
                        ));
                    }
                    else
                    {
                        $dis = 0;
                        if ($coupon->type == 'procent') {
                            $dis = $dis . "%";
                        }
                        $condition = new \Darryldecode\Cart\CartCondition(array(
                            'name' => $coupon->name,
                            'type' => 'perCategory',
                            'target' => 'total',
                            'value' => $dis,
                            'attributes' => array('code' => $coupon->name, 'znizka' => $discount, 'category' => $coupon->category)
                        ));
                        $cart = \Cart::getContent();
                        $iledalo = 0;
                        $conditionsingle = new \Darryldecode\Cart\CartCondition(array(
                            'name' => $coupon->name,
                            'type' => 'perCategory',
                            'target' => 'total',
                            'value' => $discount,
                            'attributes' => array('code' => $coupon->name, 'znizka' => $discount, 'category' => $coupon->category)
                        ));
                        foreach ($cart as $item)
                        {
                            if($item->attributes->category == $coupon->category)
                            {
                                \Cart::addItemCondition($item->id, $conditionsingle);
                                $iledalo++;
                            }
                        }
                        if($iledalo == 0)
                        {
                            return back()->with([
                                'status' => [
                                    'type' => 'danger',
                                    'content' => 'Podany kod rabatowy nie obejmuje żadnego produktu z Twojego koszyka'
                                ]
                            ]);;
                        }

                    }
                    \Cart::condition($condition);
                    $couponchange = coupon::find($coupon->id);
                    $new = $coupon->quantity - 1;
                    $couponchange->quantity =  $new;
                    $couponchange->save();
                    return back()->with([
                        'status' => [
                            'type' => 'success',
                            'content' => 'Pomyślnie dodano kod rabatowy'
                        ]
                    ]);;
                }
            } else {
                return back()->with([
                    'status' => [
                        'type' => 'danger',
                        'content' => 'Podany kod wygasł'
                    ]
                ]);;
            }
        } else {
            return back()->with([
                'status' => [
                    'type' => 'danger',
                    'content' => 'Podany kod jest niewłaściwy'
                ]
            ]);;
        }
    }
    public function usunRabat()
    {

        $condition = \Cart::getConditions();
        if ($condition->count()) {
            foreach ($condition as $cond) {
                $coupon = coupon::where('name', $cond->getName())->first();
                $qua = $coupon->quantity + 1;
                $id = $coupon->id;
                $coupon1 = coupon::find($id);
                $coupon1->quantity = $qua;
                $coupon1->save();

                \Cart::clearCartConditions();
            
            }
            $cart = \Cart::getContent();
            foreach($cart as $item)
            {
                \Cart::clearItemConditions($item->id);
            }
        }


        return back();
    }
}
