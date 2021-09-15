<?php

namespace App\Http\Controllers;

use App\Category;
use App\DeletedProduct;
use App\Http\Requests\AddProductPhoto;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProduct;
use App\ProductPhoto;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductEditController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->active()->orderBy('category_id', 'ASC')->paginate(30);
        $allprods = Product::active()->count();
        return view('ProductAll', compact('products', 'allprods'));
    }
    public function edit($product_id)
    {
        $product = Product::findOrFail($product_id);
        $categories = Category::get();
        return view('ProductEdit', compact('product', 'categories'));
    }
    public function update($product_id, UpdateProduct $request)
    {
        $product = Product::findOrFail($product_id);
        $product->name = $request->input('nazwa');
        $product->price = $request->input('cena');
        $product->amount = $request->input('ilosc');
        $product->description = $request->input('opis');
        $product->category_id = $request->input('kategoria');
        $product->save();

        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Zapisano zmiany'
            ]
        ]);
    }
    public function ProductNew()
    {
        $categories = Category::get();
        return view('AddProduct', compact('categories'));
    }
    public function create(UpdateProduct $request)
    {
        $product = new Product;
        $product->name = $request->input('nazwa');
        $product->price = $request->input('cena');
        $product->amount = $request->input('ilosc');
        $product->description = $request->input('opis');
        $product->category_id = $request->input('kategoria');
        $product->save();

        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Dodano nowy produkt pomyślnie'
            ]
        ]);
    }
    public function addPhoto($product_id, AddProductPhoto $request)
    {
        $photo = $request->file('photo');
        $filename = uniqid() . '.' . $photo->getClientOriginalExtension();
        $product = Product::findOrFail($product_id);
        $product->photos()->create([
            'photo' => $filename,
        ]);

        Storage::disk('public')->putFileAs('uploads/', $photo, $filename);
        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Dodano zdjęcie pomyślnie'
            ]
        ]);
    }
    public function deletePhoto($product_id, $photo_id)
    {
        $photo = ProductPhoto::where('product_id', $product_id)->findOrFail($photo_id);
        File::delete('storage/uploads/' . $photo->photo);
        $photo->delete();

        return back()->with([
            'status' => [
                'type' => 'danger',
                'content' => 'Zdjęcie zostało usunięte'
            ]
        ]);
    }
    public function delete($product_id)
    {
        $product = Product::with('photos')->findOrFail($product_id);
        $images = ProductPhoto::where('product_id', $product->id)->get();
        foreach ($images as $image) {
            File::delete('storage/uploads/' . $image->photo);
        }
        $product->photos()->delete();
        $product->active = 'no';
        $product->save();
        return back()->with([
            'status' => [
                'type' => 'danger',
                'content' => 'Produkt został usunięty'
            ]
        ]);
    }
    public function deleted()
    {
        $products = Product::Inactive()->paginate(30);
        return view('deletedProducts', compact('products'));
    }
    public function deletedshow($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('deletedProductShow',compact('product'));
    }
    public function przywroc($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product -> active = 'yes';
        $product -> save();
        $products = Product::Inactive()->paginate(30);
        return view('deletedProducts', compact('products'));
    }
}
