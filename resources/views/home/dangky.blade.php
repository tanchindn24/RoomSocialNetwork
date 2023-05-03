@extends('layouts.home.master')
@section('content')
    <main class="main pages">
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Đăng Ký Tài Khoản</h1>
                                            <p class="mb-30">Bạn đã có tài khoản? <a href="{{ URL::asset('dangnhap') }}">Đăng nhập</a></p>
                                        </div>
                                        <form method="post" action="{{route('register')}}" class="needs-validation">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" required="" name="txt_email" placeholder="Email" />
                                                @error('txt_email')
                                                    <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="txt_name" placeholder="Họ và tên" />
                                                @error('txt_name')
                                                    <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="txt_password" placeholder="Mật khẩu" />
                                                @error('txt_password')
                                                    <strong style="color: darkred">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="txt_password-conf" placeholder="Nhập lại mật khẩu" />
                                                @error('txt_password-conf')
                                                    <strong style="color: darkred">{{ $message }}</strong>
                                                @enderror
                                            </div>
{{--                                            <div class="payment_option mb-50">--}}
{{--                                                <div class="custome-radio">--}}
{{--                                                    <input class="form-check-input" type="radio" name="roles" id="exampleRadios3" value="3" required/>--}}
{{--                                                    <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse">Tôi là khách thuê trọ</label>--}}
{{--                                                </div>--}}
{{--                                                <div class="custome-radio">--}}
{{--                                                    <input class="form-check-input" type="radio" name="roles" id="exampleRadios4" value="2" required/>--}}
{{--                                                    <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse">Tôi là chủ trọ</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" id="exampleCheckbox12" value="" />
                                                        <label class="form-check-label" for="exampleCheckbox12"><span>Tôi đồng ý với các điều khoản và chính sách.</span></label>
                                                    </div>
                                                </div>
                                                <a href="/dangky"><i class="fi-rs-book-alt mr-5 text-muted"></i>Đọc thêm</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold" id="submit" name="login">Đăng ký</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
{{--                                    <div class="custome-radio">--}}
{{--                                        <input class="form-check-input" type="radio" name="roles" id="exampleRadiokhach" value="3" required/>--}}
{{--                                        <label class="form-check-label" for="exampleRadiokhach" data-bs-toggle="collapse">Tôi là khách thuê trọ</label>--}}
{{--                                    </div>--}}
{{--                                    <div class="custome-radio">--}}
{{--                                        <input class="form-check-input" type="radio" name="roles" id="exampleRadioschu" value="2" checked="checked" required/>--}}
{{--                                        <label class="form-check-label" for="exampleRadioschu" data-bs-toggle="collapse">Tôi là chủ trọ</label>--}}
{{--                                    </div>--}}
                                    <a href="/" class="social-login facebook-login">
                                        <img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/logo-facebook.svg') }}" alt="" />
                                        <span>Continue with Facebook</span>
                                    </a>
                                    <a href="{{ url('/auth/redirect/google') }}" class="social-login google-login">
                                        <img src="{{URL::asset('public/assets/front-end/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                        <span>Continue with Google</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
