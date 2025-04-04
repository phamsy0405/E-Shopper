@extends('layout')
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="{{ URL('/login-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="email_account" placeholder="Tài Khoản" />
                            <input type="password" name="password_account" placeholder="Mật Khẩu" />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ đăng nhập
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="{{ URL('/add-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="customer_name" placeholder="Họ và tên" />
                            <input type="email" name="customer_email" placeholder="Email" />
                            <input type="password" name="customer_password" placeholder="Mật khẩu" />
                            <input type="text" name="customer_phone" placeholder="Số điện thoại" />
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection