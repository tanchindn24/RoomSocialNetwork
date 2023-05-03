<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <title>Phòng Trọ Đà Nẵng - VKU</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/logos.svg')}}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins/slider-range.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css?v=4.0')}}" />
    {{--link old--}}
    <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/awesome/css/fontawesome-all.css')}}">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    {{--link API KEY MAP GOONG--}}
    <script src='https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.css' rel='stylesheet' />
    <link rel="stylesheet" href="{{asset('frontend/assets/sass/components/_form.scss')}}"/>
</head>

<body>
<!-- Quick view -->
{{--@yield('contentQuick-view')--}}
<header class="header-area header-style-1 header-height-2">
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/logos.svg')}}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="header-action-left">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Lọc vị trí</option>
                                        <option>Loading...</option>
                                    </select>
                                </form>
                            </div>
                            @if(Auth::user())
                            <div class="header-action-icon-2">
                                <a href="user/dangtin">
                                    <i class="fi-rs-pencil"></i>
                                </a>
                                <a href="user/dangtin"><span class="lable ml-0">Đăng tin ngay</span></a>
                            </div>
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <i class="fi fi-rs-user mr-10"></i>
                                    </a>
                                    <a href="user/profile"><span class="lable ml-0">{{Auth::user()->name}}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="user/profile"><i class="fi fi-rs-user mr-10"></i>Thông tin chi tiết</a></li>
                                            <li><a href="user/logout"><i class="fi fi-rs-sign-out mr-10"></i>Thoát</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="header-action-icon-2">
                                    <a href="user/dangtin">
                                        <i class="fi-rs-pencil"></i>
                                    </a>
                                    <a href="user/dangtin"><span class="lable ml-0">Đăng tin ngay</span></a>
                                </div>
                            <div class="header-action-icon-2">
                                <a href="#">
                                    <i class="fi fi-rs-user mr-10"></i>
                                </a>
                                <a href="#"><span class="lable ml-0">Đăng nhập / Đăng ký</span></a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li><a href="user/login"><i class="fi fi-rs-user mr-10"></i>Đăng nhập</a></li>
                                        <li><a href="user/register"><i class="fi fi-rs-user mr-10"></i>Đăng ký</a></li>
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
                    <a href="#"><img src="{{asset('frontend/assets/imgs/theme/logos.svg')}}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li>
                                    <a href="shop-grid-right.html">Loại phòng <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($categories as $category)
                                        <li><a href="category/{{$category->id}}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Giới thiệu</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/logos.svg')}}" alt="logo" /></a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…" />
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item-has-children">
                            <a href="index.html">Home</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                                <li><a href="index-5.html">Home 5</a></li>
                                <li><a href="index-6.html">Home 6</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="shop-grid-right.html">shop</a>
                            <ul class="dropdown">
                                <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                        <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                        <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                        <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-filter.html">Shop – Filter</a></li>
                                <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                <li><a href="shop-cart.html">Shop – Cart</a></li>
                                <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                <li><a href="shop-compare.html">Shop – Compare</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop Invoice</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                        <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                        <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                        <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                        <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                        <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Vendors</a>
                            <ul class="dropdown">
                                <li><a href="vendors-grid.html">Vendors Grid</a></li>
                                <li><a href="vendors-list.html">Vendors List</a></li>
                                <li><a href="vendor-details-1.html">Vendor Details 01</a></li>
                                <li><a href="vendor-details-2.html">Vendor Details 02</a></li>
                                <li><a href="vendor-dashboard.html">Vendor Dashboard</a></li>
                                <li><a href="vendor-guide.html">Vendor Guide</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Mega menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children">
                                    <a href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Dresses</a></li>
                                        <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                        <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="shop-product-right.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Jackets</a></li>
                                        <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                        <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                        <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                        <li><a href="shop-product-right.html">Tablets</a></li>
                                        <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                        <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                <li><a href="blog-category-list.html">Blog Category List</a></li>
                                <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Single Product Layout</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                        <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                        <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="page-about.html">About Us</a></li>
                                <li><a href="page-contact.html">Contact</a></li>
                                <li><a href="page-account.html">My Account</a></li>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="page-terms.html">Terms of Service</a></li>
                                <li><a href="page-404.html">404 Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap">
                <div class="single-mobile-header-info">
                    <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="page-login.html"><i class="fi-rs-user"></i>Đăng nhập / Đăng ký </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#"><i class="fi-rs-headphones"></i>(+84) - 382 - 848272 </a>
                </div>
            </div>
            <div class="mobile-social-icon mb-50">
                <h6 class="mb-15">Dev</h6>
                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                <a href="#"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
            </div>
            <div class="site-copyright">2022 © Phòng trọ Đà Nẵng. Dự án nghiên cứu và phát triển. 20IT461.</div>
        </div>
    </div>
</div>
<!--End header-->
<main class="main">
    <!--End hero-->
    <div class="container">
        <div class="row product-grid">
            <div class="col-lg-4-4">
                @yield('content')
                <!--Products Tabs-->

                <!--End Deals-->

                <!--End banners-->
            </div>
            <div class="col-lg-4-4">
                @yield('contentdetail')
            </div>
            {{--Category--}}
{{--            <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-30">--}}
{{--                <div class="sidebar-widget widget-category-2 mb-30">--}}
{{--                    <h5 class="section-title style-1 mb-30">Category</h5>--}}
{{--                    <ul>--}}
{{--                        <li>--}}
{{--                            <a href="shop-grid-right.html"> <img src="frontend/assets/imgs/theme/icons/category-1.svg" alt="" />Milks & Dairies</a><span class="count">30</span>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="shop-grid-right.html"> <img src="frontend/assets/imgs/theme/icons/category-2.svg" alt="" />Clothing</a><span class="count">35</span>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="shop-grid-right.html"> <img src="frontend/assets/imgs/theme/icons/category-3.svg" alt="" />Pet Foods </a><span class="count">42</span>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="shop-grid-right.html"> <img src="frontend/assets/imgs/theme/icons/category-4.svg" alt="" />Baking material</a><span class="count">68</span>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="shop-grid-right.html"> <img src="frontend/assets/imgs/theme/icons/category-5.svg" alt="" />Fresh Fruit</a><span class="count">87</span>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <!-- Fillter By Price -->
                <!-- Product sidebar Widget -->
        </div>
    </div>
    <!--End category slider-->
    <!--End 4 columns-->
</main>
<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                        <div class="logo mb-30">
                            <a href="#" class="mb-15"><img src="{{asset('frontend/assets/imgs/theme/logos.svg')}}" alt="logo" /></a>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-location.svg')}}" alt="" /><strong>Địa chỉ: </strong> <span>Khu Đô thị Đại học Đà Nẵng, Đường Nam Kỳ Khởi Nghĩa, quận Ngũ Hành Sơn, TP. Đà Nẵng</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-contact.svg')}}" alt="" /><strong>Liên hệ: </strong><span>(+84) - 236.6.552.688</span></li>
                            <li><img src="{{asset('frontend/assets/imgs/theme/icons/icon-email-2.svg')}}" alt="" /><strong>Email: </strong><span>daotao@vku.udn.vn</span></li>
                        </ul>
                    </div>{asset{('')}}
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Bắt đầu</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#"> Trang chủ</a></li>
                        <li><a href="#"> Tìm phòng / nhà</a></li>
                        <li><a href="#"> Đăng tin</a></li>
                        <li><a href="#"> Hướng dẫn</a></li>
                        <li><a href="#"> Đăng nhập / Đăng ký</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Đội ngũ phát triển</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Liên hệ Dev</a></li>
                        <li><a href="#">Thông tin phát triển</a></li>
                        <li><a href="#">VKU</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Tài trợ & Thông tin</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Chính sách người dùng</a></li>
                        <li><a href="#">Nhà tài trợ</a></li>
                        <li><a href="#">Trường Đại học Công nghệ Thông tin & Truyền Thông Việt - Hàn, Đại học Đà Nẵng</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col">
                    <h4 class="widget-title">Cộng đồng & Liên kết ngoài</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="#">Về chúng tôi</a></li>
                        <li><a href="#">Cộng đồng</a></li>
                        <li><a href="#">Hỗ trợ</a></li>
                        <li><a href="#">Phòng CTSV VKU</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col">
                    <h4 class="widget-title">Cài đặt Ứng dụng</h4>
                    <p class="wow fadeIn animated">Từ App Store hoặc Google Play</p>
                    <div class="download-app">
                        <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{asset('frontend/assets/imgs/theme/app-store.jpg')}}" alt="" /></a>
                        <a href="#" class="hover-up mb-sm-2"><img src="{{asset('frontend/assets/imgs/theme/google-play.jpg')}}" alt="" /></a>
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
                <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Phòng trọ Đà Nẵng</strong> - Dự án nghiên cứu và phát triển <br />20IT461</p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="frontend/assets/imgs/theme/icons/phone-call.svg" alt="hotline" />
                    <p>0382848272<span>Phạm Thanh Trường - 20IT461</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Theo dõi chúng tôi</h6>
                    <a href="https://www.facebook.com/ctsv.vku.udn.vn"><img src="{{asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
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
                <img src="{{asset('frontend/assets/imgs/theme/loading.gif')}}" alt="" />
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/slider-range.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('frontend/assets/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{asset('/frontend/assets/js/main.js?v=4.0')}}"></script>
<script src="{{asset('/frontend/assets/js/shop.js?v=4.0')}}"></script>
{{--API Map--}}
</body>
</html>
