<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('productsActive')->get();
        return view('categoryAll',compact('categories'));
    }
    public function edit($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('categoryShow',compact('category'));
    }
    public function update($category_id, AddCategory $request)
    {
        $category= Category::findOrFail($category_id);
        $category->name = $request->input('nazwa');
        $category->save();

        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Zapisano zmiany']
        ]);
    }
    public function categoryNew()
    {
        return view('categoryNew');
    }
    public function create(AddCategory $request)
    {
        $product = new Category;
        $product->name = $request->input('nazwa');
        $product->save();

        return back()->with([
            'status' => [ 'type' => 'success',
            'content' => 'Dodano nnową kategorię pomyślnie']
        ]);
    }
    public function delete($category_id)
    {
        $category = Category::withCount('productsActive')->findOrFail($category_id);
        if($category->products_active_count != 0)
        {
            return back()->with([
                'status' => [ 'type' => 'danger',
                'content' => 'Aby móć usunąć kategorię nie może ona posiadać żadnych produktów']
            ]);
        }
        else
        {
        Category::destroy($category_id);
        $categories = Category::get();
        return view('categoryAll',compact('categories'));
        
        }
        
        
    }

}
