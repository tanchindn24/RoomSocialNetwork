@extends('layouts.home.master')
@section('content')
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="i/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/logo.svg') }}" alt="logo" /></a>
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
                            <input type="text" placeholder="Tìm phòng theo địa chỉ bạn muốn..." />
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="menu-item-has-children">
                                    <a href="/">Tài Khoản</a>
                                    @if(Auth::user())
                                        <ul class="dropdown">
                                            <li><a href="/">{{Auth::user()->name}}</a></li>
                                            <li><a href="/dangtin">Đăng tin</a></li>
                                            <li><a href="/">Tin đăng của tôi</a></li>
                                            <li><a href="/">Cài đặt</a></li>
                                            <li><a href="{{url('logout')}}">Thoát</a></li>
                                        </ul>
                                    @else
                                        <ul class="dropdown">
                                            <li><a href="/dangnhap">Đăng nhập</a></li>
                                            <li><a href="/dangky">Đăng ký</a></li>
                                        </ul>
                                    @endif
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/chutro">Quản lý nhà trọ</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/tindangphongtro">Danh sách các phòng</a>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap">
                        <div class="single-mobile-header-info">
                            <a href="/"><i class="fi-rs-marker"></i> Khu Đô thị Đại học Đà Nẵng, Đường Nam Kỳ Khởi Nghĩa, quận Ngũ Hành Sơn, TP. Đà Nẵng </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="/"><i class="fi-rs-headphones"></i>(+84) 236 - 6 - 552 - 688 </a>
                        </div>
                    </div>
                    <div class="mobile-social-icon mb-50">
                        <h6 class="mb-15">Về chúng tôi</h6>
                        <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                        <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                        <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                        <a href="/"><img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
                    </div>
                    <div class="site-copyright">Phòng Trọ VKU © 20IT461. PHẠM THANH TRƯỜNG</div>
                </div>
            </div>
        </div>
        <!--End header-->
        <main class="main pages">
            <div class="page-content pt-50">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10 col-lg-12 m-auto">
                            <section class="row align-items-center mb-50">
                                <div class="col-lg-6">
                                    <img src="{{ URL::asset('public/assets/front-end/imgs/page/preview1.jpg') }}" alt="" class="border-radius-15 mb-md-3 mb-lg-0 mb-sm-4" />
                                </div>
                                <div class="col-lg-6">
                                    <div class="pl-25">
                                        <h2 class="mb-30">Chào mừng bạn đến với <br> Phòng Trọ VKU</h2>
                                        <p class="mb-25">Khi nhà trọ cũng là nhà. Phòng trọ VKU tin rằng một không gian tiện nghi, lối sống văn minh là nền móng để cư dân trẻ có tư duy sống tích cực và thành công trong cuộc sống.</p>
                                        <div class="carausel-3-columns-cover position-relative">
                                            <div id="carausel-3-columns-arrows"></div>
                                            <div class="carausel-3-columns" id="carausel-3-columns">
                                                <img src="{{ URL::asset('public/assets/front-end/imgs/page/preview2.jpg') }}" alt="" />
                                                <img src="{{ URL::asset('public/assets/front-end/imgs/page/preview3.jpg') }}" alt="" />
                                                <img src="{{ URL::asset('public/assets/front-end/imgs/page/preview4.jpg') }}" alt="" />
                                                <img src="{{ URL::asset('public/assets/front-end/imgs/page/preview2.jpg') }}" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="newsletter mb-15">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="position-relative newsletter-inner">
                                                <div class="newsletter-content">
                                                    <h2 class="mb-20">
                                                        Bạn muốn tìm phòng? <br />
                                                        Hãy để Phòng Trọ VKU giúp bạn
                                                    </h2>
                                                    <p class="mb-45">Tìm phòng trọ nhanh chóng với <span class="text-brand">Phòng Trọ VKU</span></p>
                                                    <form class="form-subcriber d-flex">
                                                        <input type="text" placeholder="Nhập địa chỉ bạn muốn tìm..." />
                                                        <button class="btn" type="submit">Tìm</button>
                                                    </form>
                                                </div>
                                                <img src="{{ URL::asset('public/assets/front-end/imgs/banner/banner-13.png') }}" alt="newsletter" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="text-center mb-50">
                                <h2 class="title style-3 mb-40">Giá Trị Văn Minh?</h2>
                                <div class="row">

                                    <div class="col mb-24">
                                        <div class="featured-card">
                                            <img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-2.svg') }}" alt="" />
                                            <h4>Hài Lòng</h4>
                                            <p>Khi nhà trọ cũng là nhà. Phòng trọ VKU tin rằng một không gian tiện nghi, lối sống văn minh là nền móng để cư dân trẻ có tư duy sống tích cực và thành công trong cuộc sống.</p>
                                            <a href="/">Đọc thêm</a>
                                        </div>
                                    </div>
                                    <div class="col mb-24">
                                        <div class="featured-card">
                                            <img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-3.svg') }}" alt="" />
                                            <h4>Chi Phí Phù Hợp</h4>
                                            <p>Khi nhà trọ cũng là nhà. Phòng trọ VKU tin rằng một không gian tiện nghi, lối sống văn minh là nền móng để cư dân trẻ có tư duy sống tích cực và thành công trong cuộc sống.</p>
                                            <a href="/">Đọc thêm</a>
                                        </div>
                                    </div>
                                    <div class="col mb-24">
                                        <div class="featured-card">
                                            <img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-4.svg') }}" alt="" />
                                            <h4>Thiết Kế Đa Dạng</h4>
                                            <p>Khi nhà trọ cũng là nhà. Phòng trọ VKU tin rằng một không gian tiện nghi, lối sống văn minh là nền móng để cư dân trẻ có tư duy sống tích cực và thành công trong cuộc sống.</p>
                                            <a href="/">Đọc thêm</a>
                                        </div>
                                    </div>
                                    <div class="col mb-24">
                                        <div class="featured-card">
                                            <img src="{{ URL::asset('public/assets/front-end/imgs/theme/icons/icon-5.svg') }}" alt="" />
                                            <h4>100% Sự Thật</h4>
                                            <p>Khi nhà trọ cũng là nhà. Phòng trọ VKU tin rằng một không gian tiện nghi, lối sống văn minh là nền móng để cư dân trẻ có tư duy sống tích cực và thành công trong cuộc sống.</p>
                                            <a href="/">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="row align-items-center mb-50">
                                <div class="row mb-50 align-items-center">
                                    <div class="col-lg-7 pr-30">
                                        <img style="border-radius: 5%" src="{{ URL::asset('public/assets/front-end/imgs/page/preview3.jpg') }}" alt="" class="mb-md-3 mb-lg-0 mb-sm-4" />
                                    </div>
                                    <div class="col-lg-5">
                                        <h4 class="mb-20 text-muted">Phòng Trọ VKU</h4>
                                        <h1 class="heading-1 mb-40">Nền tảng quản lí và cho thuê phòng trọ thông minh</h1>
                                        <p class="mb-30">Tích hợp quy trình vận hành và quản lý trong 1 hệ thống.</p>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
