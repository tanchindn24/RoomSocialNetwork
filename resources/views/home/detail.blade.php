@extends('layouts.home.master')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i></a>
                    <span></span> <a href="/{{$info->slug}}">{{$info->danhmuc->loai}}</a> <span></span>{{$info->tieu_de}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div class="detail-gallery">
                                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                            <!-- MAIN SLIDES -->
                                            <div class="product-image-slider">
                                                <?php $array_imgs = json_decode($info->hinh_anh,true) ?>
                                                @foreach($array_imgs as $imgs)
                                                <figure class="border-radius-10">
                                                    <img style="height: 320px" src="/public/assets/front-end/imgs/baiviet/<?php echo $imgs; ?>" alt="product image" />
                                                </figure>
                                                @endforeach
                                            </div>
                                            <!-- THUMBNAILS -->
                                            <div class="slider-nav-thumbnails">
                                                @foreach($array_imgs as $imgs_thumbnails)
                                                <div><img src="/public/assets/front-end/imgs/baiviet/<?php echo $imgs_thumbnails; ?>" alt="product image" /></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                            <span class="stock-status out-stock"> {{time_elapsed_string($info->created_at)}} </span>
                                            <h2 class="title-detail">{{$info->tieu_de}}</h2>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left">
                                                    <span style="font-size: 24px" class="font-weight-bold text-brand">{{number_format($info->gia)}} Đ</span>
                                                </div>
                                            </div>
                                            <div style="font-size: 17px">
                                                <ul class="mr-50 float-start">
                                                    <li class="mb-5"><i class="fi-rs-resize"></i>: <span class="text-brand">{{$info->dien_tich}}m2</span></li>
                                                    <li class="mb-5"><i class="fi-rs-location-alt"></i>: <a href="/">{{$info->dia_chi}}</a></li>
                                                    <li class="mb-5"><i class="fi-rs-smartphone"></i>: <a href="/">0{{$info->so_dien_thoai}}</a></li>
                                                    <li class="mb-5">Mục: <span class="text-brand">{{$info->danhmuc->loai}}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class=" product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Mô tả</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Tiện ích</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{$info->luot_xem}})</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                    <p>{{$info->noi_dung}}</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Additional-info">
                                                <table class="font-md">
                                                    <tbody>
                                                    <?php $count=1; $array_tienich = json_decode($info->tienich,true) ?>
                                                    @foreach($array_tienich as $tien_ich)
                                                    <tr class="stand-up">
                                                        <th>{{$count++}}</th>
                                                        <td>
                                                            <p>{{$tien_ich}}</p>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="Reviews">
                                                <!--Comments-->
{{--                                                <div class="comments-area">--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-lg-8">--}}
{{--                                                            <h4 class="mb-30">Customer questions & answers</h4>--}}
{{--                                                            <div class="comment-list">--}}
{{--                                                                <div class="single-comment justify-content-between d-flex mb-30">--}}
{{--                                                                    <div class="user justify-content-between d-flex">--}}
{{--                                                                        <div class="thumb text-center">--}}
{{--                                                                            <img src="assets/imgs/blog/author-2.png" alt="" />--}}
{{--                                                                            <a href="#" class="font-heading text-brand">Sienna</a>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="desc">--}}
{{--                                                                            <div class="d-flex justify-content-between mb-10">--}}
{{--                                                                                <div class="d-flex align-items-center">--}}
{{--                                                                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div class="product-rate d-inline-block">--}}
{{--                                                                                    <div class="product-rating" style="width: 100%"></div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="single-comment justify-content-between d-flex mb-30 ml-30">--}}
{{--                                                                    <div class="user justify-content-between d-flex">--}}
{{--                                                                        <div class="thumb text-center">--}}
{{--                                                                            <img src="assets/imgs/blog/author-3.png" alt="" />--}}
{{--                                                                            <a href="#" class="font-heading text-brand">Brenna</a>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="desc">--}}
{{--                                                                            <div class="d-flex justify-content-between mb-10">--}}
{{--                                                                                <div class="d-flex align-items-center">--}}
{{--                                                                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div class="product-rate d-inline-block">--}}
{{--                                                                                    <div class="product-rating" style="width: 80%"></div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="single-comment justify-content-between d-flex">--}}
{{--                                                                    <div class="user justify-content-between d-flex">--}}
{{--                                                                        <div class="thumb text-center">--}}
{{--                                                                            <img src="assets/imgs/blog/author-4.png" alt="" />--}}
{{--                                                                            <a href="#" class="font-heading text-brand">Gemma</a>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="desc">--}}
{{--                                                                            <div class="d-flex justify-content-between mb-10">--}}
{{--                                                                                <div class="d-flex align-items-center">--}}
{{--                                                                                    <span class="font-xs text-muted">December 4, 2021 at 3:12 pm </span>--}}
{{--                                                                                </div>--}}
{{--                                                                                <div class="product-rate d-inline-block">--}}
{{--                                                                                    <div class="product-rating" style="width: 80%"></div>--}}
{{--                                                                                </div>--}}
{{--                                                                            </div>--}}
{{--                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="col-lg-4">--}}
{{--                                                            <h4 class="mb-30">Customer reviews</h4>--}}
{{--                                                            <div class="d-flex mb-30">--}}
{{--                                                                <div class="product-rate d-inline-block mr-15">--}}
{{--                                                                    <div class="product-rating" style="width: 90%"></div>--}}
{{--                                                                </div>--}}
{{--                                                                <h6>4.8 out of 5</h6>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="progress">--}}
{{--                                                                <span>5 star</span>--}}
{{--                                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="progress">--}}
{{--                                                                <span>4 star</span>--}}
{{--                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="progress">--}}
{{--                                                                <span>3 star</span>--}}
{{--                                                                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="progress">--}}
{{--                                                                <span>2 star</span>--}}
{{--                                                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="progress mb-30">--}}
{{--                                                                <span>1 star</span>--}}
{{--                                                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>--}}
{{--                                                            </div>--}}
{{--                                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <!--comment form-->
{{--                                                <div class="comment-form">--}}
{{--                                                    <h4 class="mb-15">Add a review</h4>--}}
{{--                                                    <div class="product-rate d-inline-block mb-30"></div>--}}
{{--                                                    <div class="row">--}}
{{--                                                        <div class="col-lg-8 col-md-12">--}}
{{--                                                            <form class="form-contact comment_form" action="#" id="commentForm">--}}
{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-12">--}}
{{--                                                                        <div class="form-group">--}}
{{--                                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="col-sm-6">--}}
{{--                                                                        <div class="form-group">--}}
{{--                                                                            <input class="form-control" name="name" id="name" type="text" placeholder="Name" />--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="col-sm-6">--}}
{{--                                                                        <div class="form-group">--}}
{{--                                                                            <input class="form-control" name="email" id="email" type="email" placeholder="Email" />--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="col-12">--}}
{{--                                                                        <div class="form-group">--}}
{{--                                                                            <input class="form-control" name="website" id="website" type="text" placeholder="Website" />--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <button type="submit" class="button button-contactForm">Submit Review</button>--}}
{{--                                                                </div>--}}
{{--                                                            </form>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Các phòng cùng loại</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach($list as $list_baiviet)
                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                                <div class="product-cart-wrap hover-up">
                                                    <div class="product-img-action-wrap">
                                                        <div class="product-img product-img-zoom">
                                                            <a href="/{{$list_baiviet->slug}}" tabindex="0">
                                                                <img class="default-img" src="{{ URL::asset('public/assets/front-end/imgs/baiviet/no-images-baiviet.jpg') }}" alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="product-badges product-badges-position product-badges-mrg">
                                                            <span class="hot">{{$list_baiviet->luot_xem}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="product-content-wrap">
                                                        <h2><a href="/{{$list_baiviet->slug}}" tabindex="0">{{substr($list_baiviet->tieu_de,0,22)}}...</a></h2>
                                                        <div class="product-price">
                                                            <span>{{number_format($list_baiviet->gia)}} đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                            <div class="sidebar-widget widget-category-2 mb-30">
                                <h5 class="section-title style-1 mb-30">{{$info->chutro->name}}</h5>
                                <tr>
                                    <td class="image product-thumbnail"><img style="height: 70px" src="/public/assets/back-end/imgs/avatar/{{$info->chutro->avatar}}"></td>
                                    <td>
                                        <div class="product-rate-cover">
                                            <span>Ngày tham gia: {{date('d/m/Y', strtotime($info->chutro->created_at))}}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/chat/{{$info->chutro->id}}" class="btn btn-info">CHAT VỚI NGƯỜI BÁN</a>
                                    </td>
                                </tr>
                            </div>
                            <!-- Bai viet sidebar Widget -->
                            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Tin nổi bật</h5>
                                @foreach($baiviet_noibat as $hot)
                                <div class="single-post clearfix">
                                    <?php $array_imgs_hot = json_decode($hot->hinh_anh,true) ?>
                                    <div class="image">
                                        <img src="/public/assets/front-end/imgs/baiviet/<?php print_r (array_shift($array_imgs_hot)); ?>"/>
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="/{{$hot->slug}}">Nhà trọ {{$hot->chutro->name}}</a></h5>
                                        <p class="price mb-0 mt-5">{{number_format($hot->gia)}} đ</p>
                                        <div>
                                            <i class="fi-rs-eye" style="width: 90%"> {{$hot->luot_xem}} </i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </main>
@endsection
