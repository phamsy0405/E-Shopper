@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<<div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>


			<div class="register-req">
				<p>Đăng ký hoặc đăng nhập để thanh toán giỏ hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one" style="width: 253%;">
								<form action="{{ URL::to('/save-checkout-customer') }}" method="post">
									{{ csrf_field() }}
									<input type="text" name="shipping_email" placeholder="Email">
									<input type="text" name="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_phone" placeholder="Số điện thoại">
									<textarea name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="8"></textarea>
									<input type="submit" value="Gửi thông tin" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>

		</div>
	</section> <!--/#cart_items-->
@endsection