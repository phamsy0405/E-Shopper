@extends('layout')
@section('content')

    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Sản phẩm mới nhất</h2>
        @foreach ($all_product as $key => $product)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form>
                                @csrf
                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                            <a href="{{URL::to('/chi-tiet-san-pham/' . $product->product_id)}}">
                                <img src="{{ URL::to('public/uploads/product/' . $product->product_image)}}" alt="" />
                                <h2>{{number_format($product->product_price) . " VNĐ" }}</h2>
                                <p>{{ $product->product_name }}</p>
                            </a>
                            <button type="button" class="btn btn-default add-to-cart" data-id_product="{{ $product->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                            </form>
                        </div>
                        {{-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                                    cart</a>
                            </div>
                        </div>--}}
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm yêu thích</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Thêm so sánh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!--features_items-->
@endsection