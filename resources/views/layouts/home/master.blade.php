<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>Phòng Trọ VKU</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/public/assets/front-end/imgs/theme/favicon.svg') }}"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ URL::asset('public/assets/front-end/css/main.css?v=4.0') }}" />
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.4.0/socket.io.min.js"></script>
</head>

<body>
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span><strong>Phòng trọ VKU</strong> chào bạn!</span>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block pr-50 pl-50 mr-50 ml-50">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1 ml-10 pr-100">
                    <a href="/"><img src="{{ URL::asset('/public/assets/front-end/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="header-right pl-100">
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="/"><span class="lable">Về PT VKU</span></a>

                            </div>
                            <div class="header-action-icon-2">
                                <a href="/tindangphongtro"><span class="lable">Danh sách các phòng</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="/chutro"><span class="lable">Quản lý nhà trọ</span></a>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="/chat"><span class="lable">Chat</span></a>
                            </div>
                            @if(Auth::user())
                                <div class="header-action-icon-2">
                                    <a href="/"><span class="lable ml-0">{{Auth::user()->name}}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="/"><i class="fi fi-rs-user mr-10"></i>Tài khoản của tôi</a></li>
                                            <li><a href="/dangtin"><i class="fi fi-rs-pencil mr-10"></i>Đăng tin</a></li>
                                            <li><a href="/"><i class="fi fi-rs-heart mr-10"></i>Tin đăng của tôi</a></li>
                                            <li><a href="/"><i class="fi fi-rs-settings-sliders mr-10"></i>Cài đặt</a></li>
                                            <li><a href="{{url('logout')}}"><i  class="fi fi-rs-sign-out mr-10"></i>Thoát</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="header-action-icon-2">
                                    <a href="/"><span class="lable ml-0">Tài Khoản</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="/dangnhap"><i class="fi fi-rs-user mr-10"></i>Đăng nhập</a></li>
                                            <li><a href="/dangky"><i class="fi fi-rs-pencil mr-10"></i>Đăng ký</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="/">
                                <img alt="Nest" src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-heart.svg') }}" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('content')
<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/logo.svg') }}" alt="logo" /></a>
                            <p class="font-lg text-heading">Tìm phòng trọ nhanh hơn với Phòng Trọ VKU</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-location.svg') }}" alt="" /><strong>Địa chỉ: </strong> <span>Khu Đô thị Đại học Đà Nẵng, Đường Nam Kỳ Khởi Nghĩa, quận Ngũ Hành Sơn, TP. Đà Nẵng</span></li>
                            <li><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-contact.svg') }}" alt="" /><strong>Số điện thoại: </strong><span>(+84) - 236-6-552-688</span></li>
                            <li><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-email-2.svg') }}" alt="" /><strong>Email: </strong><span>daotao@vku.udn.vn</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Bắt đầu</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="/">Tìm phòng / nhà trọ</a></li>
                        <li><a href="/">Đăng tin</a></li>
                        <li><a href="/">Hướng dẫn</a></li>
                        <li><a href="/">Dăng nhập / Đăng ký</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Đội ngũ phát triển</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/">Liên hệ Dev</a></li>
                        <li><a href="/">Thông tin phát triển</a></li>
                        <li><a href="/">Đại Học Công Nghệ Thông Tin & Truyền Thông Việt - Hàn</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Tài trợ & Thông tin</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/">Chính sách người dùng</a></li>
                        <li><a href="/">Nhà tài trợ</a></li>
                        <li><a href="/">Đại Học Công Nghệ Thông Tin & Truyền Thông Việt - Hàn</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Cộng đồng & Liên kết ngoài</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="/">Về chúng tôi</a></li>
                        <li><a href="/">Cộng đồng</a></li>
                        <li><a href="/">Hỗ trợ</a></li>
                        <li><a href="/">Phòng CTSV VKU</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col">
                    <h4 class="widget-title">Cài đặt ứng dụng tại</h4>
                    <p class="wow fadeIn animated">App Store or Google Play</p>
                    <div class="download-app">
                        <a href="/" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{ URL::asset('public/assets/front-end/imgs/theme/app-store.jpg') }}" alt="" /></a>
                        <a href="/" class="hover-up mb-sm-2"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/google-play.jpg') }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container pb-30">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Phòng Trọ VKU</strong> - Dự án nghiên cứu và phát triển <br />Phạm Thanh Trường - 20IT461</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block"></div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Liên hệ chúng tôi</h6>
                    <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                    <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                    <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                    <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                    <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="{{ URL::asset('public/assets/front-end/imgs/theme/loading.gif') }}" alt="" />
            </div>
        </div>
    </div>r
</div>
<!-- Vendor JS-->
<script src="{{ URL::asset('public/assets/front-end/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/slick.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/jquery.syotimer.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/wow.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/perfect-scrollbar.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/magnific-popup.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/select2.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/waypoints.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/counterup.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/jquery.countdown.min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/images-loaded.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/isotope.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/scrollup.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/jquery.vticker-min.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/jquery.theia.sticky.js') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/plugins/jquery.elevatezoom.js') }}"></script>
<!-- Template  JS -->
<script src="{{ URL::asset('public/assets/front-end/js/main.js?v=4.0') }}"></script>
<script src="{{ URL::asset('public/assets/front-end/js/shop.js?v=4.0') }}"></script>
</body>
</html>
