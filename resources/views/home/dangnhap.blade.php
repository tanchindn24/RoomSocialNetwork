@extends('layouts.home.master')
@section('content')
    <main class="main pages">
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block" style="background: url('{{URL::asset('public/assets/front-end/imgs/page/login-1.png')}}') no-repeat center center;background-size: auto 100%;border-radius: 15px">
                            </div>
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white card-login">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Đăng Nhập</h1>
                                            <p class="mb-30">Bạn chưa có tài khoản? <a href="{{ URL::to('dangky') }}">Đăng ký ngay</a></p>
                                            @if(session('notification_register'))
                                                <strong style="color: darkred">{{ session('notification_register') }}</strong>
                                            @elseif(session('notification_login'))
                                                <strong style="color: darkred">{{ session('notification_login') }}</strong>
                                            @endif
                                        </div>
                                        <form method="post" action="{{route('login')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" required="" name="txt_email" placeholder="Email *" />
                                                @error('txt_email')
                                                    <strong style="color: darkred">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="txt_password" placeholder="Mật khẩu *" />
                                                @error('txt_password')
                                                    <strong style="color: darkred">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Ghi nhớ</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="#">Quên mật khẩu?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Đăng nhập</button>
                                            </div>
                                            <div class="form-group">
                                                <a href="/" class="social-login facebook-login">
                                                    <img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/logo-facebook.svg') }}" alt="" />
                                                    <span>Continue with Facebook</span>
                                                </a>
                                                <a href="{{ url('/auth/redirect/google') }}" class="social-login google-login">
                                                    <img src="{{URL::asset('public/assets/front-end/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                                    <span>Continue with Google</span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
