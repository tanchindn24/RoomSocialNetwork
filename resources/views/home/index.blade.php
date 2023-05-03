@extends('layouts.master')
@section('content')
    <?php
    function limit_description($string){
        $string = strip_tags($string);
        if (strlen($string) > 100) {
            // truncate string
            $stringCut = substr($string, 0, 100);
            $endPoint = strrpos($stringCut, ' ');
            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'năm', 'm' => 'tháng', 'w' => 'tuần', 'd' => 'ngày',
            'h' => 'giờ', 'i' => 'phút', 's' => 'giây',
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
<!--  MAP API  -->
    <style>
        .search-map{
            position: relative;
        }
        .box-search {
            position: absolute;
            bottom: 20px;
            right: 12px;
            background: #223B73;
            width: 600px;
            padding: 15px;
            border: 1px solid #f0f0f0;
            font-size: 16px;
            color: #7E7E7E;
            padding: 15px 30px;
            font-family: "Quicksand", sans-serif;
            font-weight: 700;
            border-radius: 10px;
            border: 1px solid #ececec;
        }
        .box-search ul li a.active {
            color: #fff;
            background-color: #3BB77E;
            border-radius: 10px;
        }
        .tab-content > .tab-pane {
            display: none;
        }
        .tab-content > .active {
            display: block;
        }
        .form-group {
            margin-bottom: 15px;
            display: flex;
        }
    </style>
    <section class="home-slider position-relative mb-30">
        <div class="home-slide-cover">
            <div class="hero-slider-1 style-4 dot-style-1">
                <div class="single-hero-slider rectangle single-animation-wrap style-4 dot-style-1">
                    <div style="position: relative;">
                        <div class="search-map">
                            <div id='map' style="width: auto; height: 530px;"></div>
                            <div class="box-search">
                                <ul class="nav flex-row" role="tablist">
                                    <li id="tab1id" class="nav-item" >
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#hptab1" role="tab" aria-controls="dashboard" aria-selected="false">Tìm kiếm theo bộ lọc</a>
                                    </li>
{{--                                    <li id="tab2id" class="nav-item">--}}
{{--                                        <a data-bs-toggle="tab" href="#hptab2" class="nav-link" role="tab" aria-controls="orders" aria-selected="false">Khoanh vùng trên bản đồ (lỗi)</a>--}}
{{--                                    </li>--}}
                                </ul>
                                <div class="tab-content">
                                    <div id="hptab1" class="tab-pane in active">
                                        <form onsubmit="return false">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <select class="select-active" data-live-search="true" id="selectdistrict">
                                                        @foreach($district as $quan)
                                                            <option data-tokens="{{$quan->slug}}" value="{{ $quan->id }}">{{ $quan->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">
                                                    <select class="select-active" data-live-search="true" id="selectcategory">
                                                        @foreach($categories as $category)
                                                            <option data-tokens="{{ $category->slug }}" value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <select class="select-active" id="selectprice" data-live-search="true">
                                                        <option data-tokens="khoang gia" min="1" max="1000000000">Khoảng giá</option>
                                                        <option data-tokens="Tu 500.000 VNĐ - 700.000 VNĐ" min="500000" max ="700000">Từ 500.000 VNĐ - 700.000 VNĐ</option>
                                                        <option data-tokens="Tu 700.000 VNĐ - 1.000.000 VNĐ" min="700000" max ="1000000">Từ 700.000 VNĐ - 1.000.000 VNĐ</option>
                                                        <option data-tokens="Tu 1.000.000 VNĐ - 1.500.000 VNĐ" min="1000000" max ="1500000">Từ 1.000.000 VNĐ - 1.500.000 VNĐ</option>
                                                        <option data-tokens="Tu 1.500.000 VNĐ - 3.000.000 VNĐ" min="1500000" max ="3000000">Từ 1.500.000 VNĐ - 3.000.000 VNĐ</option>
                                                        <option data-tokens="Tren 3.000.000 VNĐ" min="3000000" max="10000000">Trên 3.000.000 VNĐ</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-6">
                                                    <button class="btn btn-success" onclick="searchMotelajax()">Tìm kiếm ngay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="flat"></div>
                                    <div id="lng"></div>
                                </div>
                            </div>
                            <script
                                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW6mnr2uV6B9H9kFlkECWsbcX3ZLrmh_g&libraries=geometry,drawing&callback=initMap"
                                    async defer type="text/javascript">
                            </script>
                            <script>
                                // goongjs.accessToken = 'SRtuCtj7sVvYjjS59n4WJIaHoNoERcaZ8XYopWQZ';
                                // var map = new goongjs.Map({
                                //     container: 'map',
                                //     style: 'https://tiles.goong.io/assets/goong_map_web.json', // stylesheet location
                                //     center: [108.2053320454115, 16.05425959957465], // starting position [lng, lat]
                                //     zoom: 10 // starting zoom
                                // });
                                // Initialize and add the map
                                function initMap() {
                                    const dnvn = { lat: 16.05425959957465, lng: 108.2053320454115 };
                                    const map = new google.maps.Map(document.getElementById("map"), {
                                        zoom: 15,
                                        center: dnvn,
                                    });
                                    const marker = new google.maps.Marker({
                                        position: dnvn,
                                        map: map,
                                    });
                                }
                                window.initMap = initMap;
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--  END MAP API  --}}
    <section class="product-tabs section-padding position-relative">
        <div class="section-title style-2">
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">Mới đăng</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two" aria-selected="false">Nổi bật</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Đánh giá cao</button>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach($hot_motelroom as $room)
                    <div class="col-lg-1-5 col-md-4 col-10 col-sm-8">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img style="width: 229px;height: 174px" class="default-img" src="{{ URL::to('/uploads/images/'.$room->images) }}" alt="" />
                                        <img style="width: 229px;height: 174px" class="hover-img" src="{{ URL::to('/uploads/images/'.$room->images) }}" alt="" />
                                    </a>
                                </div>
{{--                                <div class="product-action-1">--}}
{{--                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>--}}
{{--                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>--}}
{{--                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>--}}
{{--                                </div>--}}
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">
                                        <?php
                                            echo time_elapsed_string($room->created_at);
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="category/{{ $room->category->id }}">{{ $room->category->name }}</a>
                                </div>
                                <h2><a href="phongtro/{{ $room->slug }}">Phòng trọ {{$room->user->name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-detail-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">Chủ trọ <a href="#">{{ $room->user->name }}</a></span><br>
                                    <span style="font-size: small">{{ $room->area }} m<sup>2</sup></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>{{ number_format($room->price) }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="phongtro/{{ $room->slug }}"><i class="fi-rs-eye"></i> {{ $room->count_view }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        var map;
        function initMap() {
            map = new google.maps(document.getElementById('map'), {
                center: {lat: 16.070372, lng: 108.214388},
                zoom: 15,
                draggable: true
            });
            /* Get latlng list phòng trọ */
            addDrawingControl(map);
        }
        function addDrawingControl(map){
            //add drawing control
            var drawingControl = new google.maps.drawing.DrawingManager({
                drawingMode: null,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [
                        google.maps.drawing.OverlayType.POLYLINE
                    ]
                },
                polylineOptions: {
                    editable: true,
                    draggable: false,
                    geodesic: true
                }
            });
            drawingControl.setMap(map);
//                  var point = new google.maps.LatLng(21.034031, 105.814262);
            var id_category_change = 1;
            var min_change = 1;
            var max_change = 100000000;
            $('#selectcategory2').change(function() {
                id_category_change = $("#selectcategory2").val();
            });
            $('#selectprice2').change(function(){
                min_change = $("#selectprice2 option:selected").attr("min");
                max_change = $("#selectprice2 option:selected").attr("max");
            });
            google.maps.event.addListener(drawingControl, 'polylinecomplete', function(polyline){
                if($('#tab2id').hasClass('active')){
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: 16.070372, lng: 108.214388},
                        zoom: 12,
                        draggable: true
                    });
                    addDrawingControl(map);
//                          console.log(polyline.getPath().getArray());
                    addpolyline = new google.maps.Polyline({
                            map: map,
                            path: polyline.getPath()
                        }
                    );
                    //
                    var id_category = id_category_change;
                    var min = min_change;
                    var max = max_change;
                    var data_send = {
                        min_price: min,
                        max_price: max,
                        id_category: id_category
                    };
                    $.ajax({
                        url : "searchpoly",
                        method : "POST",
                        data : data_send,
                        success : function (result){
                            var result_room = JSON.parse(result);
                            var number = 0;
                            for (i in result_room){
                                var data = result_room[i];
                                var latlng =  new google.maps.LatLng(data.lat,data.lng);
                                if(google.maps.geometry.poly.containsLocation(latlng, polyline) == true) {
                                    number= number + 1;
                                    var phongtro = new google.maps.Marker({
                                        position:  latlng,
                                        map: map,
                                        title: data.title,
                                        icon: "images/gps.png",
                                        content: '<div class="abcdef"></div>'
                                    });
                                    var infowindow = new google.maps.InfoWindow();
                                    (function(phongtro, data){
                                        var content = '<div id="iw-container">' +
                                            '<img height="200px" width="300" src="uploads/images/'+data.image+'">'+
                                            '<a href="phongtro/'+data.slug+'" style="width: 300px;  display: block;" target="_blank"><div class="iw-title">' + data.title +'</div></a>' +
                                            '<p style="width: 300px;  display: block;"><i class="fas fa-map-marker" style="color:#003352"></i> '+ data.address +'<br>'+
                                            '<br>Phone. ' +data.phone +'</div>';
                                        google.maps.event.addListener(phongtro, "click", function(e){
                                            infowindow.setContent(content);
                                            infowindow.open(map, phongtro);
                                        });
                                    })(phongtro,data);
                                }
                            }
                            if(number != 0){
                                toastr.success('Tìm thấy '+number+' kết quả ');
                                $('.box-search-poly').css('display', 'inline-block');
                            }
                            else{
                                toastr.warning('Không tìm thấy kết quả nào');
                                $('.box-search-poly').css('display', 'none');
                            }
                        }
                    })
                }
            })
        }
    </script>
@endsection
