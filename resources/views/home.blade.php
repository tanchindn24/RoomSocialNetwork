@extends('layout.home.app')
@section('content')
    @include('layout.home.rental_provider')
    <!--End rental provider slider-->
    <div class="row">
        <div class="col-lg-12">
            <section class="product-tabs section-padding position-relative">
                <div class="section-title style-2">
                    <h3>Posts</h3>
                    <ul class="nav nav-tabs links" id="myTab" role="tablist">
                        @foreach($category as $value)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="#" aria-controls="tab-one" aria-selected="true">{{ $value->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            @foreach($post as $value)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-none d-xl-block">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            @php $images = json_decode($value->image); $first_image = reset($images); @endphp
                                            <a href="#">
                                                <img class="default-img" src="{{asset("/images/posts/$first_image")}}" alt="" />
                                                <img class="hover-img" src="{{asset("/images/posts/$first_image")}}" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $value->Category->name }}</a>
                                        </div>
                                        <h2><a href="#">{{ $value->title }}</a></h2>
                                        <div>
                                            <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $value->User->name }}</a></span>
                                        </div>
                                        @if (Auth::check() && Auth::user()->roles === 3)
                                        <div class="product-card-bottom">
                                            <div class="add-cart">
                                                <a class="add" href="{{ route('seeker.chat.provider.id', $value->user_id) }}"><i class="fi-rs-box mr-5"></i> Chat </a>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end product card-->
                            @endforeach
                        </div>
                        <!--End product-grid-4-->
                    </div>
                </div>
                <!--End tab-content-->
            </section>
            <!--Products Tabs-->
            {{-- @include('layout.home.deals_of_the_day')--}}
            <!--End Deals-->
        </div>
    </div>
@endsection
