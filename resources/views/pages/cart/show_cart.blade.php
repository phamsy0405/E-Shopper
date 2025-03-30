@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="table-responsive cart_info">

                <h2 style="text-align: center;">Giỏ hàng của bạn</h2>
                <form action="{{ URL::to('/update-cart') }}" method="post">
                    @csrf
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Hình ảnh sản phẩm</td>
                                <td class="description">Tên sản phẩm</td>
                                <td class="price">Giá</td>
                                <td class="quantity">Số lượng</td>
                                <td class="total">Thành tiền</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::get('cart') == true)
                                                    <?php
                                $total = 0;
                                                                                    ?>
                                                    @foreach(Session::get('cart') as $key => $cart)
                                                                        <?php
                                                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                                                        $total += $subtotal;
                                                                                                                                                        ?>
                                                                        <tr>
                                                                            <td class="cart_product">
                                                                                <a href=""><img src="{{ asset('public/uploads/product/' . $cart['product_image']) }}"
                                                                                        alt="{{ $cart['product_name'] }}"></a>
                                                                            </td>
                                                                            <td class="cart_description">
                                                                                <h4><a href=""></a></h4>
                                                                                <p>{{ $cart['product_name'] }}</p>
                                                                            </td>
                                                                            <td class="cart_price">
                                                                                <p>{{ number_format($cart['product_price'], 0, ',', '.') }} vnđ</p>
                                                                            </td>
                                                                            <td class="cart_quantity">
                                                                                <div class="cart_quantity_button">

                                                                                    <input class="cart_quantity" type="number" min="1"
                                                                                        data-session_id="{{ $cart['session_id'] }}"
                                                                                        name="cart_qty[{{ $cart['session_id'] }}]" value="{{ $cart['product_qty'] }}"
                                                                                        autocomplete="off">

                                                                                </div>
                                                                            </td>
                                                                            <td class="cart_total">
                                                                                <p class="cart_total_price">{{ number_format($subtotal, 0, ',', '.') }} vnđ</p>
                                                                            </td>
                                                                            <td class="cart_delete">
                                                                                <a class="cart_quantity_delete"
                                                                                    href="{{ URL('/delete-cart/' . $cart['session_id']) }}"><i
                                                                                        class="fa fa-times"></i></a>
                                                                            </td>
                                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                                                class="check_out btn-sm"></td>
                                                        <td><a class="btn btn-default check_out" href="{{URL('/delete-all-cart') }}">Xóa tất cả giỏ
                                                                hàng</a></td>


                                                    </tr>
                            @else
                                                    <tr>
                                                        <td colspan="5">
                                                            @php
                                                                session()->forget('cart');
                                                                $total = 0;
                                                                echo '<h4 style="color: red;">Giỏ hàng trống</h4>'
                                                            @endphp
                                                        </td>
                                                    </tr>
                            @endif
                        </tbody>
                </form>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng tiền <span>{{ number_format($total, 0, ',', '.') }} vnđ</span></li>
                            <li>Thuế <span>0 vnđ</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>$59</span></li>
                        </ul>
                        <?php
								$customer_id = Session::get('customer_id');
								if($customer_id != NULL){
								?>
                        <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                        <?php
								}else{
								?>
                        <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Thanh toán</a>
                        <?php
								}
								?>
                    </div>
                </div>
            </div>
    </section><!-- #do_action -->
@endsection