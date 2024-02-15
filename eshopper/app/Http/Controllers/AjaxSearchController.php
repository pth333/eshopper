<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AjaxSearchController extends Controller
{
    public function ajaxSearch(Request $request){
        $dataSearch = Product::where('name', 'like', '%' . $request->search . '%')->limit(5)->get();
        // dd($dataSearch);
        return view('product.search.search',compact('dataSearch'));
    }

}
