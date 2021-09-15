<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MainController extends Controller
{
    public function index()
    {
        $url = Storage::url('slider.jpg');
        $products = Product::with('photos')->active()->where('category_id', '1')->take(20)->get();
     //   dd($products);
        return view('main', compact( 'url' , 'products'));
    }
   
}
