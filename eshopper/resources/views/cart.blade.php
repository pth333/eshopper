@extends('layouts.master')
@section('title','Giỏ hàng')
@section('css')
<link rel="stylesheet" href="{{ asset('home/home.css')}}">
@endsection
@php
$file = 'http://127.0.0.1:8000';
@endphp
@section('content')
<div class="cart_wrapper update_cart_url" data-url="{{ route('updateCart')}}">
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description">Description</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        @endphp

                        @foreach($cartProducts as $id => $cartProduct)
                        @php
                        $total += ($cartProduct['price'] * $cartProduct['quantity']);
                        @endphp
                        <tr>
                        <th class="cart_item" data-product-id="{{ $id }}" style="display: none;">
                        </th>
                        <td class="cart_product">
                            <a href=""><img src="{{ $file.$cartProduct['feature_image_path']}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{ $cartProduct['name']}}</a></h4>

                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($cartProduct['price'])}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cartProduct['quantity']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($cartProduct['price'] * $cartProduct['quantity']) . ' đ'}}</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" data-url="{{ route('deleteCart')}}"><i class="fa fa-times" style="color: red;"></i></a>
                        </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="total_area">
                        <ul >
                            <li class="cart_grand_total">Cart Sub Total <span>{{ number_format($total) . ' đ'}}</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
</div>
@endsection

@section('js')
<script src="{{ asset('cart_product/cart.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection