<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Social MotellRoom</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/frontend/imgs/theme/favicon.svg')}}"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/plugins/slider-range.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/main.css?v=4.0')}}"/>
</head>

<body>
<!-- Quick view -->
<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-2.jpg" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-1.jpg" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-3.jpg" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-4.jpg" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-5.jpg" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-6.jpg" alt="product image"/>
                                </figure>
                                <figure class="border-radius-10">
                                    <img src="assets/frontend/imgs/shop/product-16-7.jpg" alt="product image"/>
                                </figure>
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                <div><img src="assets/frontend/imgs/shop/thumbnail-3.jpg" alt="product image"/></div>
                                <div><img src="assets/frontend/imgs/shop/thumbnail-4.jpg" alt="product image"/></div>
                                <div><img src="assets/frontend/imgs/shop/thumbnail-5.jpg" alt="product image"/></div>
                                <div><img src="assets/frontend/imgs/shop/thumbnail-6.jpg" alt="product image"/></div>
                                <div><img src="assets/frontend/imgs/shop/thumbnail-7.jpg" alt="product image"/></div>
                                <div><img src="assets/frontend/imgs/shop/thumbnail-8.jpg" alt="product image"/></div>
                                <div><img src="assets/frontend/imgs/shop/thumbnail-9.jpg" alt="product image"/></div>
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of
                                    Change Organic Quinoa, Brown</a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand">$38</span>
                                    <span>
                                                <span class="save-price font-md color3 ml-15">26% Off</span>
                                                <span class="old-price font-md ml-15">$52</span>
                                            </span>
                                </div>
                            </div>
                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <span class="qty-val">1</span>
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <button type="submit" class="button button-add-to-cart"><i
                                            class="fi-rs-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul>
                                    <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2021</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header-area header-style-1 header-height-2">
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="/"><img src="assets/frontend/imgs/theme/logo.svg" alt="logo"/></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form action="#">
                            <select class="select-active">
                                <option>All Categories</option>
                                <option>Milks and Dairies</option>
                                <option>Wines & Alcohol</option>
                                <option>Clothing & Beauty</option>
                                <option>Pet Foods & Toy</option>
                                <option>Fast food</option>
                                <option>Baking material</option>
                                <option>Vegetables</option>
                                <option>Fresh Seafood</option>
                                <option>Noodles & Rice</option>
                                <option>Ice cream</option>
                            </select>
                            <input type="text" placeholder="Search for items..."/>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="search-location">
                                <form action="#">
                                    <select class="select-active">
                                        <option>Your Location</option>
                                        <option>Alabama</option>
                                        <option>Alaska</option>
                                        <option>Arizona</option>
                                        <option>Delaware</option>
                                        <option>Florida</option>
                                        <option>Georgia</option>
                                        <option>Hawaii</option>
                                        <option>Indiana</option>
                                        <option>Maryland</option>
                                        <option>Nevada</option>
                                        <option>New Jersey</option>
                                        <option>New Mexico</option>
                                        <option>New York</option>
                                    </select>
                                </form>
                            </div>
                            <div class="header-action-icon-2">
                                <a href="page-account.html">
                                    <img class="svgInject" alt="Nest"
                                         src="assets/frontend/imgs/theme/icons/icon-user.svg"/>
                                </a>
                                @if(Auth::check())
                                    <a href="{{ route('seeker.index') }}"><span class="lable ml-0">{{ Auth::user()->name }}</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="{{ route('seeker.index') }}"><i class="fi fi-rs-user mr-10"></i>My
                                                    Account</a></li>
                                            <li><a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign
                                                    out</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="#"><span class="lable ml-0">Login / Register</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li><a href="{{route('login')}}"><i
                                                        class="fi fi-rs-user mr-10"></i>Login</a></li>
                                            <li><a href="{{route('register')}}"><i class="fi fi-rs-user mr-10"></i>Register</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
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
                    <a href="{{route('home.index')}}"><img src="{{URL::asset('assets/frontend/imgs/theme/logo.svg')}}"
                                                           alt="logo"/></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                <li class="hot-deals"><img src="assets/frontend/imgs/theme/icons/icon-hot.svg"
                                                           alt="hot deals"/><a href="shop-grid-right.html">Hot Deals</a>
                                </li>
                                <li>
                                    <a class="active" href="/">Home <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="/">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                        <li><a href="index-6.html">Home 6</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="page-about.html">About</a>
                                </li>
                                <li>
                                    <a href="shop-grid-right.html">Store <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                        <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                        <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                        <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                        <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                        <li>
                                            <a href="#">Single Product <i class="fi-rs-angle-right"></i></a>
                                            <ul class="level-menu">
                                                <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                                <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                                <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                                <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog-category-grid.html">Blog <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                        <li><a href="blog-category-list.html">Blog Category List</a></li>
                                        <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                        <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                        <li>
                                            <a href="#">Single Post <i class="fi-rs-angle-right"></i></a>
                                            <ul class="level-menu level-menu-modify">
                                                <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                                <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                                <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Pages <i class="fi-rs-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-contact.html">Chat</a></li>
                                        <li><a href="page-account.html">My Account</a></li>
                                        <li><a href="page-login.html">Login</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-terms.html">Terms of Service</a></li>
                                        <li><a href="page-404.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('seeker.chat.provider') }}">Chat</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
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
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="assets/frontend/imgs/theme/icons/icon-heart.svg"/>
                                <span class="pro-count white">4</span>
                            </a>
                        </div>
                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="shop-cart.html">
                                <img alt="Nest" src="assets/frontend/imgs/theme/icons/icon-cart.svg"/>
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                                                   src="assets/frontend/imgs/shop/thumbnail-3.jpg"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest"
                                                                                   src="assets/frontend/imgs/shop/thumbnail-4.jpg"/></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                            <h3><span>1 × </span>$3500.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{--mobile layout--}}
@include('layout.home.mobile')
<!--End header-->
<main class="main">
    <section class="home-slider position-relative mb-30">
        <div class="home-slide-cover">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                <div class="single-hero-slider rectangle single-animation-wrap"
                     style="background-image: url(assets/frontend/imgs/slider/slider-5.png)">
                    <div class="slider-content">
                        <h1 class="display-2 mb-40 text-success">
                           Tìm trọ<br/>
                        </h1>
                        <p class="mb-65 text-danger">Nhanh chóng - An Toàn - Tiện tích</p>
                    </div>
                </div>
                <div class="single-hero-slider rectangle single-animation-wrap"
                     style="background-image: url(assets/frontend/imgs/slider/slider-6.png)">
                    <div class="slider-content">
                        <h1 class="display-2 mb-40 text-primary">
                            Quản lý trọ<br/>
                        </h1>
                        <p class="mb-65 text-danger">Đơn giản - Dễ sử dụng - Chính xác</p>
                    </div>
                </div>
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </section>
    <!--End hero-->
    <div class="container mb-30">
        @yield('content')
    </div>
    {{--    @include('layout.home.4_columns')--}}
    <!--End 4 columns-->
</main>
@include('layout.home.footer')
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="https://media.giphy.com/media/sSgvbe1m3n93G/giphy.gif" alt=""/>
            </div>
        </div>
    </div>
</div>
<!-- Vendor JS-->
<script src="{{URL::asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/slick.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/wow.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/slider-range.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/magnific-popup.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/waypoints.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/counterup.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/images-loaded.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/isotope.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/scrollup.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{URL::asset('assets/frontend/js/main.js?v=4.0')}}"></script>
<script src="{{URL::asset('assets/frontend/js/shop.js?v=4.0')}}"></script>
</body>
</html>
