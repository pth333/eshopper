<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function index()
    {
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();
        $cartProducts = session()->get('cart');
        return view('cart', compact('categoriesLimit', 'cartProducts'));
    }
    public function AddToCart($id)
    {
        $product = Product::find($id);
        // Lấy thông tin giỏ hàng từ session
        $cart = session()->get('cart');
        // $cart = Session::forget('cart');
        try {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
            } else {
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'feature_image_path' => $product->feature_image_path
                ];
            }
            // Lưu thông tin giỏ hàng vào session
            session()->put('cart', $cart);
            return response()->json([
                'cart' => $cart,
                'message' => 'success'
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function updateCart(Request $request)
    {
        // dd($request->all());
        // 
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();

        if ($request->productId && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->productId]['quantity'] =  $request->quantity;
            session()->put('cart', $carts);
            $cartProducts = session()->get('cart');
            // dd($carts);
            $cartComponent = view('cart', compact('categoriesLimit', 'cartProducts'))->render();
            return response()->json([
                'cart_component' => $cartComponent,
                'code' => 200
            ], 200);
        }
    }
    public function deleteCart(Request $request)
    {
        $categoriesLimit = Category::where('parent_id', 0)->take(3)->get();

        if (session()->has('cart')) {
            // Lấy giỏ hàng từ session
            $carts = session()->get('cart');
            // dd($carts[$request->productId]);
            if (isset($carts[$request->productId])) {
                unset($carts[$request->productId]);
                $carts = session()->put('cart', $carts);
                $cartProducts = session()->get('cart');
                
                // dd($cartProducts);
                $cartComponent = view('cart', compact('categoriesLimit', 'cartProducts'))->render();
                return response()->json([
                    'cart_component' => $cartComponent,
                    'code' => 200
                ], 200);
            }
        }
    }
}
