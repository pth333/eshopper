@php
$files = 'http://127.0.0.1:8000';
@endphp
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($products as $product)
 
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$files.$product->feature_image_path}}" alt="" />
                    <h2>{{number_format($product->price)}} VND</h2>
                    <p>{{$product->name}}</p>
                    @csrf
                    <a href="" data-url="{{ route('addToCart',['id' => $product->id])}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
               
            </div>
        </div>
    </div>
    @endforeach


</div><!--features_items-->
