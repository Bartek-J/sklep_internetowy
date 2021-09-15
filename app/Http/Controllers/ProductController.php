<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\QueryFilters\ProductFilters;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductFilters $filters, Request $request)
    {
        $all=0;
        $categories= array();
        $c= Category::get('id');
        foreach ($c as $caa)
        {
            $u=$request->input($caa->id);
            if (isset($u) ) $categories[]= $caa->id;
        }
        if(empty($categories)) $categories= $c; 
       if(count($categories)== count($c)) $all=1;
       

        if(isset($_GET['from'])) { $bet1 = $_GET['from']; } else {$bet1=0;}
        if(isset($_GET['to'])) { $bet2 = $_GET['to'];} else { $bet2=10000;}  
        if(isset($_GET['sortowanie'])) { $sortowanie = $_GET['sortowanie'];} else $sortowanie=1; 
        switch($sortowanie)
        { 
            case "alfabetycznie":
                $products = Product::with('photos')->active()->filterBy($filters)->whereIn('category_id', $categories)->orderBy('name','ASC')->paginate(12);
                break;
            case "rosnaco":
                $products = Product::with('photos')->active()->filterBy($filters)->whereIn('category_id', $categories)->orderBy('price','ASC')->paginate(12);
                break;
            case "malejaco":
                $products = Product::with('photos')->active()->filterBy($filters)->whereIn('category_id', $categories)->orderBy('price','DESC')->paginate(12);
                break;
            default:
            $products = Product::with('photos')->active()->filterBy($filters)->whereIn('category_id', $categories)->paginate(12);
            break;
        }
        
      

        $prod = Product::filterBy($filters)->active()->whereIn('category_id', $categories)->count();
        $prodall = Product::active()->count();
        $categories = Category::withCount('productsActive')->get();
        //dd($categories);
        return view('product', compact('products','prod','categories','prodall','bet1','bet2','all','sortowanie'));
    }
    public function show($product_id)
    {
        $product = Product::with('photos')->findOrFail($product_id);
        $category = Category::find($product->category_id);
        return view('productPage', compact('product','category'));
    }
    public function add_to_cart($product_id)
    {
        $product = Product::with('photos')->findOrFail($product_id);
        if($product->photos->count())
        {
        $photo = $product->photos->first()->photo;
        }
        else
        {
            $photo = null;
        }
        if(isset($_GET['ile'])) { $ilej = $_GET['ile']; } else { $ilej=1; }
        $price = $product->price;
        $wymiar = null;
        if($product->category_id == '1')
        {
            $price = $price + $_GET['rozmiar'];
            if($_GET['rozmiar'] == '500') $wymiar = 'A4';
            elseif($_GET['rozmiar'] == '2000') $wymiar = 'A3';
            else $wymiar = 'A5';
        }
        \Cart::add($product->id, $product->name, $price, $ilej, array( 'photo' => $photo, 'category' => $product->category_id, 'format' => $wymiar));
       
        $coupons = \Cart::getConditions();
        foreach ($coupons as $coupon)
        {
            if($coupon->getAttributes()['category'] == $product->category_id)
            {
                $conditionsingle = new \Darryldecode\Cart\CartCondition(array(
                    'name' => $coupon->getName(),
                    'type' => 'perCategory',
                    'target' => 'total',
                    'value' => $coupon->getAttributes()['znizka'],
                    'attributes' => array('code' => $coupon->getName(), 'znizka' => $coupon->getAttributes()['znizka'] , 'category' => $coupon->getAttributes()['category'] )
                ));
                \Cart::addItemCondition($product->id, $conditionsingle);
            }
        }
        
        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Dodano produkt do koszyka']
        ]);
    }
}
