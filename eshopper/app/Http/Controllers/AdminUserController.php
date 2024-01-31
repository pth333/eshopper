<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

class AdminUserController extends Controller
{
    public function loginUsers()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('login', compact('categoriesLimit'));
    }
    public function postLoginUsers(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('home');
        }
    }
}
