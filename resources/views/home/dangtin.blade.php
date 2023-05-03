@extends('layouts.home.master')
@section('content')
    {{--  Preview media  --}}
    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="/public/assets/krajee-jquery-multi-media/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
    <link href="/public/assets/krajee-jquery-multi-media/themes/explorer-fa5/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/plugins/buffer.min.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/plugins/filetype.min.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/plugins/sortable.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/fileinput.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/vi.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/locales/fr.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/js/locales/es.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/themes/fa5/theme.js" type="text/javascript"></script>
    <script src="/public/assets/krajee-jquery-multi-media/themes/explorer-fa5/theme.js" type="text/javascript"></script>
    <main class="main mx-5">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Trang chủ</a>
                    <span></span> Đăng tin cho thuê
                </div>
            </div>
        </div>
        <div class="container mb-80 mt-50">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h2 class="heading-2 mb-10">Đăng tin cho thuê</h2>
                    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body">đăng tin cho thuê phòng trọ của bạn <span class="text-brand">tại đây</span></h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="border p-20 cart-totals mb-20">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h6>Thông tin người đăng</h6>
                        </div>
                        <div class="divider-2 mb-20"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                <tr>
                                    <td class="image product-thumbnail"><img src="/public/assets/back-end/imgs/avatar/{{Auth::user()->avatar}}" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a class="text-heading">{{Auth::user()->name}}</a></h6>
                                        <div class="product-rate-cover">
                                            <span>Ngày tham gia: {{date('d/m/Y', strtotime(Auth::user()->created_at))}}</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <form action="{{route('dangtinphong')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <lable>
                                        Tiêu đề bài đăng
                                        <span class="required">*</span>
                                    </lable>
                                    <input type="text" name="tieude">
                                </div>
                                <div class="form-group col-lg-6">
                                    <lable>
                                        Số điện thoại
                                        <span class="required">*</span>
                                    </lable>
                                    <input type="number" name="sodienthoai">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <lable>
                                        Diện tích
                                        <span class="required">m2</span>
                                    </lable>
                                    <input type="text" name="dientich">
                                </div>
                                <div class="form-group col-lg-6">
                                    <lable>
                                        Giá
                                        <span class="required">VND</span>
                                    </lable>
                                    <input type="text" name="gia">
                                </div>
                            </div>
                            <div class="row shipping_calculator">
                                <div class="form-group col-lg-6">
                                    <lable>
                                        Danh mục
                                        <span class="required">*</span>
                                    </lable>
                                    <div class="custom_select">
                                        <select class="form-control select-active" name="danhmuc">
                                            <optgroup label="--Chọn loại phòng--"></optgroup>
                                            @foreach($list as $list)
                                            <option value="{{$list->id}}">{{$list->loai}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <lable>
                                        Quận huyện
                                        <span class="required">*</span>
                                    </lable>
                                    <div class="custom_select">
                                        <select class="form-control select-active" name="quanhuyen">
                                            <option value="">Chọn quận huyện</option>
                                            <option value="VN">Liên chiểu</option>
                                            <option value="VN">Sơn trà</option>
                                            <option value="VN">Ngũ Hành Sơn</option>
                                            <option value="VN">Cẩm lệ</option>
                                            <option value="VN">Thanh khê</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <lable>
                                        Địa chỉ phòng trọ: (Bạn có thể nhập hoặc chọn vị trí trên bản đồ)
                                        <span class="required">*</span>
                                    </lable>
                                    <input type="text" name="diachi"/>
                                    {{-- <input type="text" id="location-text" name="diachi" value=""/>
                                    <input type="hidden" id="diachi" name="diachi" value="" />
                                    <input type="hidden" id="txt_lat" name="kinhdo" value="" />
                                    <input type="hidden" id="txt_lng" name="vido" value="" />
                                    --}}
                                </div>
                            </div>
{{--                                <div id="map-canvas" style="width:auto; height: 400px"></div>--}}
                            <div class="row shipping_calculator">
                                <div class="form-group">
                                    <lable>
                                        Tiện tích
                                        <span class="required">*</span>
                                    </lable>
                                    <div class="custom_select">
                                        <select class="form-control select-active" multiple name="tienich[]">
                                            <option value="Không">Không</option>
                                            <option value="Trọ có điều hòa">Trọ có điều hòa</option>
                                            <option value="Có nơi để xe">Có nơi để xe</option>
                                            <option value="Gác lửng">Gác lửng</option>
                                            <option value="Tủ + giường">Tủ + giường</option>
                                            <option value="Giờ giấc tự do">Giờ giấc tự do</option>
                                            <option value="Wifi">Wifi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <lable>
                                    Mô tả ngắn:
                                    <span class="required">*</span>
                                </lable>
                                <textarea rows="5" name="mota"></textarea>
                            </div>
                            <div class="form-group">
                                <lable>
                                    Thêm hình ảnh
                                    <span class="required">*</span>
                                    <div class="file-loading">
                                        <input id="file-load-preview" type="file" class="file" multiple name="hinhanh[]">
                                    </div>
                                </lable>

                            </div>
                            <button type="submit" class="btn btn-fill-out btn-block mt-30">Đăng tin<i class="fi-rs-sign-out ml-15"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $('#file-load-preview').fileinput({
                theme: 'fa5',
                language: 'vi',
                browseClass: "btn btn-primary",
                overwriteInitial: false,
                initialPreviewAsData: true,
                'uploadUrl': '#',
                allowedFileExtensions: ['jpg', 'png', 'gif'],
            }).on('filebatchpreupload', function(e, data) {
                return {
                    message: 'Vui lòng load lại trang và nhấn vào nút đăng tin',
                    data: data
                }
            });
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0vUzjSBpugpcJajv7emHms7iNlYOh6JQ&callback=initialize&libraries=geometry,places" async defer>
        </script>
        <script>
            var map;
            var marker;
            function initialize() {
                 mapOptions = {
                     // kinh độ vĩ độ
                     center: {lat: 16.072188, lug: 108.227030},
                     zoom :12,
                 };
                 map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

                 // get Geometry Location
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var pos = new google.maps.LatLng(position.coords.latitude,
                            position.coords.longitude);
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            'latlng': pos
                        }, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    console.log(results[0].formatted_address);
                                } else {
                                    console.log('Khong tim thay ket qua');
                                }
                            } else {
                                console.log('Loi Geocoder ly do: ' + status);
                            }
                        });
                        map.getCenter(pos);
                        marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            draggable: true,
                        });
                    }, function () {
                        handleNoGeolocation(true);
                    });
                } else {
                    // Browser doesn't support Geolocation
                    handleNoGeolocation(false);
                }

                function handleNoGeolocation(errorFlag) {
                   if (errorFlag) {
                       var content = 'Error: Dinh vi that bai.';
                   } else {
                       var content = 'Error: Trinh duyet cua ban khong ho tro dinh vi.'
                   }

                   var options = {
                       map: map,
                       zoom: 20,
                       position: new google.maps.LatLng(16.072188,108.227030),
                       content: content,
                   };

                   map.setCenter(options.position);
                   marker = new google.maps.Marker({
                       position: options.position,
                       map: map,
                       zoom: 20,
                       icon: "/public/assets/images/location.png",
                       draggable: true
                   });
                   /* Đánh dấu vị trí
                   * The dragend event kích hoạt khi kết thúc thao tác kéo (bằng cách nhả nút chuột hoặc nhấn phím thoát). */
                    google.maps.event.addListener(marker, 'dragend', function () {
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({'latlng': marker.getPosition()}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    $('#location-text').val(results[0].formatted_address);
                                    $('#diachi').val(results[0].formatted_address);
                                    $('#txt_lat').val(marker.getPosition().lat());
                                    $('#txt_lng').val(marker.getPosition().lat());
                                    infowindow.setContent(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                }
                            }
                        });
                    });
                    /* Kết thúc event Dragend bắt thông tin vị trí */
                }
                var input = (document.getElementById('location-text'));
                var autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.bindTo('bounds', map);
                var infowindow = new google.maps.InfoWindow();
                marker = new google.maps.Marker({
                    map: map,
                    icon: "/public/assets/images/location.png",
                    anchorPoint: new google.maps.Point(0, -29),
                    draggable: true,
                });

                google.maps.event.addListener(autocomplete, 'place_changed', function () {
                    infowindow.close();
                    marker.setVisible(false);
                    var place = autocomplete.getPlace();
                    if (!place.geometry) {
                        return;
                    }
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'latlng': place.geometry.location}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                $('#diachi').val(results[0].formatted_address);
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);
                            }
                        }
                    });
                    // Nếu địa chỉ nhập vào có thì hiển thị trên bản đồ
                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.fitBounds(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setIcon({
                        url: "/public/assets/images/location.png"
                    });
                    document.getElementById('txt_lat').value = place.geometry.location.lat();
                    document.getElementById('txt_lng').value = place.geometry.location.lng();
                    console.log(place.geometry.location.lat());
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                    var address = '';
                    if (place.address_components) {
                        address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                        ].join(' ');
                    }
                    /* sử dụng Dregend để đánh dấu */
                    google.maps.event.addListener(marker, 'dragend', function () {
                        var geocoder = new google.maps.Geocoder();
                        geocoder.geocode({'latlng': marker.getPosition()}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    $('#location-text').val(results[0].formatted_address);
                                    $('#txt_lat').val(marker.getPosition().lat());
                                    $('#txt_lng').val(marker.getPosition().lng());
                                    infowindow.setContent(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                }
                            }
                        });
                    });
                    /* End Dragend */
                });
            }
        </script>
    </main>
@endsection
