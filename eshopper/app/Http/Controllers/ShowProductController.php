<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShowProductController extends Controller
{
    public function showProduct($id)
    {
        $products = Product::find($id);
        $categories = Category::where('parent_id',0)->get();
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('show_product',compact('products','categories','categoriesLimit'));
    }
}
