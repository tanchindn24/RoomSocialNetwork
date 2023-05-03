@extends('layouts.home.master')
@section('content')
    <main class="main">
        <section class="bg-grey-1 section-padding pt-100 pb-80 mb-80">
            <div class="container">
                <h1 class="mb-80 text-center">Tin Đăng Cho Thuê</h1>
                <div class="row product-grid mx-5">
                    @foreach($list as $list)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <?php $array_imgs = json_decode($list->hinh_anh,true) ?>
                                <div class="product-img product-img-zoom">
                                    <a href="{{route('detail.slug',$list->slug)}}">
                                        <img class="default-img" src="/public/assets/front-end/imgs/baiviet/<?php print_r (array_shift($array_imgs)); ?>" alt="" />
                                        <img class="hover-img" src="/public/assets/front-end/imgs/baiviet/<?php print_r (array_shift($array_imgs)); ?>" alt="" />
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Lưu tin" class="action-btn" href="/"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Chia sẻ" class="action-btn" href="/"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Xem" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="sale">{{time_elapsed_string($list->created_at)}}</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="/">{{$list->danhmuc->loai}}</a>
                                </div>
                                <h2><a href="/">Nhà trọ {{$list->chutro->name}}</a></h2>
                                <div class="product-rate-cover">
                                    <span class="font-small ml-5 text-muted"><i class="fi fi-rs-location-alt"></i> {{substr($list->dia_chi, 0, 40)}}...</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">Người đăng: <a href="/">{{$list->chutro->name}}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>{{number_format($list->gia)}}đ</span>
                                        <span class="old-price"></span>
                                    </div>
                                    <div class="add-cart">
                                        <a href="/">{{$list->luot_xem}} <i class="fi fi-rs-eye ml-5"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end product card-->
                </div>
                <!--row-->
{{--                <h1 class="text-center mt-100 mb-80">Deals of the day</h1>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-3 col-lg-4 col-md-6">--}}
{{--                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay="0">--}}
{{--                            <div class="product-img-action-wrap">--}}
{{--                                <div class="product-img">--}}
{{--                                    <a href="shop-product-right.html">--}}
{{--                                        <img src="assets/imgs/banner/banner-5.png" alt="" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-content-wrap">--}}
{{--                                <div class="deals-countdown-wrap">--}}
{{--                                    <div class="deals-countdown" data-countdown="2025/03/25 00:00:00"></div>--}}
{{--                                </div>--}}
{{--                                <div class="deals-content">--}}
{{--                                    <h2><a href="shop-product-right.html">Seeds of Change Organic Quinoa, Brown, & Red Rice</a></h2>--}}
{{--                                    <div class="product-rate-cover">--}}
{{--                                        <div class="product-rate d-inline-block">--}}
{{--                                            <div class="product-rating" style="width: 90%"></div>--}}
{{--                                        </div>--}}
{{--                                        <span class="font-small ml-5 text-muted"> (4.0)</span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">NestFood</a></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card-bottom">--}}
{{--                                        <div class="product-price">--}}
{{--                                            <span>$32.85</span>--}}
{{--                                            <span class="old-price">$33.8</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-cart">--}}
{{--                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-4 col-md-6">--}}
{{--                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">--}}
{{--                            <div class="product-img-action-wrap">--}}
{{--                                <div class="product-img">--}}
{{--                                    <a href="shop-product-right.html">--}}
{{--                                        <img src="assets/imgs/banner/banner-6.png" alt="" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-content-wrap">--}}
{{--                                <div class="deals-countdown-wrap">--}}
{{--                                    <div class="deals-countdown" data-countdown="2026/04/25 00:00:00"></div>--}}
{{--                                </div>--}}
{{--                                <div class="deals-content">--}}
{{--                                    <h2><a href="shop-product-right.html">Perdue Simply Smart Organics Gluten Free</a></h2>--}}
{{--                                    <div class="product-rate-cover">--}}
{{--                                        <div class="product-rate d-inline-block">--}}
{{--                                            <div class="product-rating" style="width: 90%"></div>--}}
{{--                                        </div>--}}
{{--                                        <span class="font-small ml-5 text-muted"> (4.0)</span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">Old El Paso</a></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card-bottom">--}}
{{--                                        <div class="product-price">--}}
{{--                                            <span>$24.85</span>--}}
{{--                                            <span class="old-price">$26.8</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-cart">--}}
{{--                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-4 col-md-6 d-none d-lg-block">--}}
{{--                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">--}}
{{--                            <div class="product-img-action-wrap">--}}
{{--                                <div class="product-img">--}}
{{--                                    <a href="shop-product-right.html">--}}
{{--                                        <img src="assets/imgs/banner/banner-7.png" alt="" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-content-wrap">--}}
{{--                                <div class="deals-countdown-wrap">--}}
{{--                                    <div class="deals-countdown" data-countdown="2027/03/25 00:00:00"></div>--}}
{{--                                </div>--}}
{{--                                <div class="deals-content">--}}
{{--                                    <h2><a href="shop-product-right.html">Signature Wood-Fired Mushroom and Caramelized</a></h2>--}}
{{--                                    <div class="product-rate-cover">--}}
{{--                                        <div class="product-rate d-inline-block">--}}
{{--                                            <div class="product-rating" style="width: 80%"></div>--}}
{{--                                        </div>--}}
{{--                                        <span class="font-small ml-5 text-muted"> (3.0)</span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">Progresso</a></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card-bottom">--}}
{{--                                        <div class="product-price">--}}
{{--                                            <span>$12.85</span>--}}
{{--                                            <span class="old-price">$13.8</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-cart">--}}
{{--                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-3 col-lg-4 col-md-6 d-none d-xl-block">--}}
{{--                        <div class="product-cart-wrap style-2 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">--}}
{{--                            <div class="product-img-action-wrap">--}}
{{--                                <div class="product-img">--}}
{{--                                    <a href="shop-product-right.html">--}}
{{--                                        <img src="assets/imgs/banner/banner-8.png" alt="" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="product-content-wrap">--}}
{{--                                <div class="deals-countdown-wrap">--}}
{{--                                    <div class="deals-countdown" data-countdown="2025/02/25 00:00:00"></div>--}}
{{--                                </div>--}}
{{--                                <div class="deals-content">--}}
{{--                                    <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry Juice</a></h2>--}}
{{--                                    <div class="product-rate-cover">--}}
{{--                                        <div class="product-rate d-inline-block">--}}
{{--                                            <div class="product-rating" style="width: 80%"></div>--}}
{{--                                        </div>--}}
{{--                                        <span class="font-small ml-5 text-muted"> (3.0)</span>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <span class="font-small text-muted">By <a href="vendor-details-1.html">Yoplait</a></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card-bottom">--}}
{{--                                        <div class="product-price">--}}
{{--                                            <span>$15.85</span>--}}
{{--                                            <span class="old-price">$16.8</span>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-cart">--}}
{{--                                            <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <?php
            function time_elapsed_string($datetime, $full = false) {
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);

                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'năm',
                    'm' => 'tháng',
                    'w' => 'tuần',
                    'd' => 'ngày',
                    'h' => 'giờ',
                    'i' => 'phút',
                    's' => 'giây',
                );
                foreach ($string as $k => &$v) {
                    if ($diff->$k) {
                        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
                    } else {
                        unset($string[$k]);
                    }
                }

                if (!$full) $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
            }
            ?>
        </section>
    </main>
@endsection
