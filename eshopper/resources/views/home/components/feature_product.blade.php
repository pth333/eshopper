@php
$files = 'http://127.0.0.1:8000';
@endphp
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Features Items</h2>
    @foreach($products as $product)
    @php
    $space_price = $product->price - (float) $product->sale_price;
    $discount_percent = ($space_price / $product->price) * 100;
    $round_percent = round($discount_percent, 0, PHP_ROUND_HALF_UP);
    @endphp
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{ route('showProduct', ['id' => $product->id, 'slug' => $product->slug]) }}">
                        <img src="{{$files.$product->feature_image_path}}" alt="" />
                    </a>
                    <p>{{$product->name}}</p>
                    <div class="price_gr">
                        @if (number_format((float) $product->sale_price) != 0)
                        <h5 style="color: orange;" class="discounted-price">{{number_format((float) $product->sale_price)}} VND</h5>
                        <h6 class="original-price">{{number_format($product->price)}} VND</h6>
                        @else
                        <h5 style="color: orange">{{number_format($product->price)}} VND</h5>
                        @endif
                    </div>
                    @csrf
                    <a data-url="{{ route('addToCart',['id' => $product->id])}}" class="btn btn-default cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>

            </div>

        </div>
    </div>
    @endforeach


</div><!--features_items-->

<style>
    .productinfo img {
        cursor: pointer;
        height: 341px;
    }

    .original-price {
        text-decoration: line-through;
    }

    .price_gr {
        display: flex;
        justify-content: center;
    }

    p {
        margin-top: 15px;
        font-size: larger;
    }
</style>
