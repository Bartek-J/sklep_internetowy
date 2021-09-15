<?php

namespace App\Http\Controllers;

use App\Category;
use App\coupon;
use App\Http\Requests\NewCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = coupon::get();
        return view('coupons', compact('coupons'));
    }
    public function RabatNew()
    {
        $cats = Category::get();
        return view('couponAdd',compact('cats'));
    }
    public function create(NewCoupon $request)
    {
        if($request->input('category') != 'all')
        {
            $category = Category::findOrFail($request->input('category'));
            $catname = $category->name;
        }
        else
        {
            $category = 'all';
            $catname = 'all';
        }
        $disc = $request->input('discount');
        if( $request->input('type') == 'kwota')
        {
            $disc= $disc * 100;
        }

        $coupon = new coupon;
        $coupon->name = $request->input('nazwa');
        $coupon->quantity = $request->input('ilosc');
        $coupon->discount = $disc;
        $coupon->type = $request->input('type');
        $coupon->expires_at = $request->input('expires');
        $coupon->category = $request->input('category');
        $coupon ->categoryName = $catname;
        $coupon->save();

        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Dodano kupon pomyślnie'
            ]
        ]);
    }
    public function delete($coupon_id)
    {
        $coupon = coupon::findOrFail($coupon_id);
        $coupon->delete();
        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Usunięto kupon pomyślnie'
            ]
        ]);
    }
}
