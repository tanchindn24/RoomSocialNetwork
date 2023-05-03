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
<div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
	{{--<div class="search-map hidden-xs" >--}}
	<div class="search-map" >

		<div id="map"></div>

		<div class="box-search">
		    <ul class="nav nav-tabs">
                <li id="tab1id" class="active " ><a data-toggle="tab" href="#hptab1" class="awhite">Tìm kiếm theo bộ lọc</a></li>
                <li id="tab2id"><a data-toggle="tab" href="#hptab2"  class="awhite">Khoanh vùng trên bản đồ</a></li>
              </ul>
            <div class="tab-content" style=" margin-top: 12px; ">
                <div id="hptab1" class="tab-pane fade in active">
                 <form onsubmit="return false">
                 	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group row">
                <div class="col-xs-6">
                 	<select class="selectpicker" data-live-search="true" id="selectdistrict">
                 		@foreach($district as $quan)
                 			<option data-tokens="{{$quan->slug}}" value="{{ $quan->id }}">{{ $quan->name }}</option>
                 		@endforeach
                 	</select>
                </div>
                <div class="col-xs-6">
                 	<select class="selectpicker" data-live-search="true" id="selectcategory">
                 		@foreach($categories as $category)
                 			<option data-tokens="{{ $category->slug }}" value="{{ $category->id }}">{{ $category->name }}</option>
                 		@endforeach
                 	</select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                 	<select class="selectpicker" id="selectprice" data-live-search="true">
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
                <div id="hptab2" class="tab-pane fade">
                    <form onsubmit="return false">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group row">

				<div class="col-xs-6">
					<select class="selectpicker" data-live-search="true" id="selectcategory2">
						@foreach($categories as $category)
							<option data-tokens="{{ $category->slug }}" value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>
				<div class="col-xs-6">
					<select class="selectpicker" id="selectprice2" data-live-search="true">
							<option data-tokens="khoang gia" min="1" max="1000000000">Khoảng giá</option>
							<option data-tokens="Tu 500.000 VNĐ - 700.000 VNĐ" min="500000" max ="700000">Từ 500.000 VNĐ - 700.000 VNĐ</option>
							<option data-tokens="Tu 700.000 VNĐ - 1.000.000 VNĐ" min="700000" max ="1000000">Từ 700.000 VNĐ - 1.000.000 VNĐ</option>
							<option data-tokens="Tu 1.000.000 VNĐ - 1.500.000 VNĐ" min="1000000" max ="1500000">Từ 1.000.000 VNĐ - 1.500.000 VNĐ</option>
							<option data-tokens="Tu 1.500.000 VNĐ - 3.000.000 VNĐ" min="1500000" max ="3000000">Từ 1.500.000 VNĐ - 3.000.000 VNĐ</option>
							<option data-tokens="Tren 3.000.000 VNĐ" min="3000000" max="10000000">Trên 3.000.000 VNĐ</option>
					</select>
				</div>
				</div>
				<div class="form-group row" style="padding: 0 20px">
							<p style="color: #ffffff; font-style: italic "> *Chọn loại phòng và khoảng giá, sau đó bấm vào biểu tượng
							<img src="images/drawingcontrolicon.png" style="display: inline-block"width="20px"> ở phía trên để bắt đầu khoanh
							vùng khu vực mà bạn muốn tìm kiếm</p>
				</div>
					</form>
                </div>

				<div id="flat"></div>
					<div id="lng"></div>

		        </div>
	        </div>
        </div>
		<div class="container">
		</div>
			<div class="container">
				<div class="row" style="margin-top: 10px; margin-bottom: 10px">
					<div class="col-md-6">
						<div class="asks-first">
					        <div class="asks-first-circle">
					            <span class="fa fa-search"></span>
					        </div>
					        <div class="asks-first-info">
					            <h2>Giải pháp tìm kiếm mới</h2>
					            <p>Tiết kiệm nhiều thời gian cho bạn với giải pháp và công nghệ mới</p>
					        </div>
				        </div>
					</div>
					<div class="col-md-6">
						<div class="asks-first2">
					        <div class="asks-first-circle">
					            <span class="fas fa-hourglass-start"></span>

					        </div>
					    <div class="asks-first-info">
					            <h2>An Toàn - Nhanh chóng</h2>
					            <p>Với đội ngũ Quản trị viên kiểm duyệt hiệu quả, Chất Lượng đem lại sự tin tưởng.</p>
					    </div>
				        </div>
					</div>
				</div>					
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
					  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
						  <li><a href="">Phòng trọ xem nhiều nhất</a></li>
						  <li class="active"><a href="moinhat">Phòng trọ mới nhất</a></li>
						</ul>
						<form class="navbar-form navbar-right" role="search">
						  <div class="form-group">
							<input type="text" class="form-control" placeholder="">
						  </div>
						  <button type="submit" class="btn btn-default">Tìm kiếm</button>
						</form>
						</ul>
					  </div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				  </nav>
				  <br>
				<h3 class="title-comm"><span class="title-holder">PHÒNG TRỌ MỚI NHẤT</span></h3>
				<div class="row room-new">
						@foreach($new_motelroom as $room)
					<div class="col-md-10">
						<div class="room-item-vertical">
							<div class="col-md-4">
								<div class="wrap-img-vertical">
									<img style="width: 100%;height: 136%;" src="{{ URL::to('/uploads/images/'.$room->images) }}" class="lazyload img-responsive">
									<div class="category">
										<a href="category/{{ $room->category->id }}">{{ $room->category->name }}</a>
									</div>
								</div>
							</div>
				<div class="room-detail">
					<h4><a href="phongtro/{{ $room->slug }}">{{ $room->title }}</a></h4>
					<div class="room-meta">
						<span><i class="fas fa-user-circle"></i> Người đăng: <a href="/"> {{ $room->user->name }}</a></span>
						<span class="pull-right"><i class="far fa-clock"></i>
							<?php 
								echo time_elapsed_string($room->created_at);
							?>
						</span>
					</div>

				<div class="room-description"><i class="fas fa-audio-description"></i>
						{{ limit_description($room->description) }}
					</div>
				<div class="room-info">
						<span><i class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->area }} m<sup>2</sup></b></span>
						<span class="pull-right"><i class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
							<div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->address }}</div>
							<div style="color: #e74c3c"><i class="far fa-money-bill-alt"></i> Giá thuê: 
								<b>{{ number_format($room->price) }} VNĐ</b></div>
							</div>
							</div>
					</div>
					</div>
						@endforeach								
					</div>

	
				{{-- <div class="col-md-4">
				<img src="images/ADVANCE.png" width="100%">
				</div> --}}
				</div>
				<div class="container">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-end">
						{{ $new_motelroom->links() }}
					</ul>
				</nav>
				</div>
			</div>			
						{{-- script --}}

<script>

	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 21.034031, lng: 105.814262},
		zoom: 12,
		draggable: true
			});
			/* Get latlng list phòng trọ */
				addDrawingControl(map);

			/*$arrmergeLatln = array();
			foreach ($map_motelroom as $room) {
				$arrlatlng = json_decode($room->latlng,true);
				$arrImg = json_decode($room->images,true);
				$arrmergeLatln[] = ["slug"=> $room->slug ,"lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->title,"address"=> $room->address,"image"=>$arrImg[0],"phone"=>$room->phone];

				}

				$js_array = json_encode($arrmergeLatln);
				echo "var javascript_array = ". $js_array . ";\n";*/



					}
			/*$(".box-search ul li a").click(function(){
                if($('#tab1id').hasClass('active')){
                        addDrawingControl(map);
                        }

            	});*/

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
                          center: {lat: 21.034031, lng: 105.814262},
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhAcZsDVJY_xRevJvHaH8Zc1-9_bDUbOQ&libraries=geometry,drawing&callback=initMap"
	async defer></script>

	@endsection