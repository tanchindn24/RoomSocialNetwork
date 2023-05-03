@extends('layouts.master')
@section('contentdetail')
<?php 
function limit_description($string){
	$string = strip_tags($string);
	if (strlen($string) > 150) {

	    // truncate string
		$stringCut = substr($string, 0, 150);
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
<div class="gap"></div>
<main class="main">
	<div class="page-header breadcrumb-wrap">
		<div class="container">
			<div class="breadcrumb">
			<a href="#">{{ $motelroom->category->name }}</a> <span></span> {{ $motelroom->title }}
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xl-11 col-lg-12 m-auto">
				<div class="row">
					<div class="col-xl-9">
						<div class="product-detail accordion-detail">
							<div class="row mb-50 mt-30">
								<div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
									<div class="detail-gallery">
										<span class="zoom-icon"><i class="fi-rs-search"></i></span>
										<!-- MAIN SLIDES -->
										<div class="product-image-slider">
											<figure class="border-radius-10">
												<img style="width: 500px;height: 400px" src="{{ URL::to('uploads/images/'.$motelroom->images) }}" alt="product image" />
											</figure>
										</div>
										<!-- THUMBNAILS -->
										<div class="slider-nav-thumbnails">
											<div><img style="width: 100px;height: 90px" src="{{ URL::to('uploads/images/'.$motelroom->images) }}" alt="product image" /></div>
										</div>
									</div>
									<!-- End Gallery -->
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12">
									<div class="detail-info pr-30 pl-30">
										<span class="stock-status out-stock"> <?php echo time_elapsed_string($motelroom->created_at); ?> </span>
										<h2 class="title-detail" style="font-size: 35px">{{ $motelroom->title }}</h2>
										<div class="product-detail-rating">
											<div class="product-rate-cover text-end">
												<span class="fi-rs-eye"> {{ $motelroom->count_view }} lượt xem</span>
											</div>
										</div>
										<div class="clearfix product-price-cover">
											<div class="product-price primary-color float-left">
												<span class="current-price text-brand" style="font-size: 30px">{{ number_format($motelroom->price) }} /Tháng</span>
											</div>
										</div>
										<div class="font-sm">
											<ul class="mr-50 float-start">
												<li class="mb-5">Diện tích: <span class="text-brand">{{$motelroom->area}} m2</span></li>
											</ul>
											<ul class="float-start">
												<li class="mb-5">Địa chỉ: <a href="#">{{ $motelroom->address }}</a></li>
											</ul>
										</div>
									</div>
									<!-- Detail Info -->
								</div>
							</div>
							<div class="product-info">
								<div class="tab-style3">
									<ul class="nav nav-tabs text-uppercase">
										<li class="nav-item">
											<a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Chi tiết</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Tiện ích</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Thông tin người đăng</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Bình luận ({{ $motelroom->count_view }})</a>
										</li>
									</ul>
									<div class="tab-content shop_info_tab entry-main-content">
										<div class="tab-pane fade show active" id="Description">
											<div class="">
												<p>{{ $motelroom->description }}</p>
											</div>
										</div>
										<div class="tab-pane fade" id="Additional-info">
											<table class="font-md">
												<tbody>
													<tr class="stand-up">
														<th>Các dịch vụ thêm</th>
														<td>
															<p>Đang cập nhật thêm...</p>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="tab-pane fade" id="Vendor-info">                                                   
											<div class="vendor-logo d-flex mb-30">
												@if($motelroom->user->avatar == 'no-avatar.jpg')
												<img src="images/no-avatar.jpg" style="border-radius: 50%;width: 100px;height: 100px;"/>
												@else
												<img src="uploads/avatars/<?php echo $motelroom->user->avatar; ?>" style="border-radius: 50%;width: 100px;height: 100px;"> 
												@endif
												<div class="vendor-name ml-15">
													<h6>
														<a href="#">{{ $motelroom->user->name }}</a>
													</h6>
												</div>
											</div>
											<ul class="contact-infor mb-50">
												<li><strong>Liên hệ:</strong><span> {{ $motelroom->phone }}</span></li>
											</ul>                                          
										</div>
										<div class="tab-pane fade" id="Reviews">
											<!--Comments-->
											<div class="comments-area">
												<div class="row">
													<div class="col-lg-8">
														<h4 class="mb-30">Bình luận của người xem</h4>
														<div class="comment-list">
															@foreach($comment as $cmt)
															<div class="single-comment justify-content-between d-flex mb-30">
																<div class="user justify-content-between d-flex">
																	<div class="thumb text-center">
																		<img src="uploads/avatars/<?php echo $cmt->avatar; ?>" style="border-radius: 50%;width: 70px;height: 70px;"/><br>
																		<a href="#" class="font-heading text-brand">{{ $cmt->name }}</a>
																	</div>
																	<div class="desc">
																		<div class="d-flex justify-content-between mb-10">
																			<div class="d-flex align-items-center">
																				<span class="font-xs text-muted">
																					<?php echo time_elapsed_string($cmt->created_at); ?>
																				</span>
																			</div>
																		</div>
																		<p class="mb-10">{{$cmt->content}} <br> <a href="#" class="reply">Phản hồi</a></p>
																	</div>
																</div>
															</div>
															@endforeach
															<nav aria-label="Page navigation example">
																<ul class="pagination justify-content-end">
															{{ $comment->links() }}
																</ul>
															</nav>
														</div>
													</div>
													{{-- <div class="col-lg-4">
														<h4 class="mb-30">Customer reviews</h4>
														<div class="d-flex mb-30">
															<div class="product-rate d-inline-block mr-15">
																<div class="product-rating" style="width: 90%"></div>
															</div>
															<h6>4.8 out of 5</h6>
														</div>
														<div class="progress">
															<span>5 star</span>
															<div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
														</div>
														<div class="progress">
															<span>4 star</span>
															<div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
														</div>
														<div class="progress">
															<span>3 star</span>
															<div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
														</div>
														<div class="progress">
															<span>2 star</span>
															<div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
														</div>
														<div class="progress mb-30">
															<span>1 star</span>
															<div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
														</div>
														<a href="#" class="font-xs text-muted">How are ratings calculated?</a>
													</div> --}}
												</div>
											</div>
											<!--comment form-->
											<div class="comment-form">
												<h4 class="mb-15">Để lại bình luận của bạn</h4>
												@if(Auth::user())
												<div class="row">
													<div class="col-lg-8 col-md-12">
														<form class="form-contact comment_form" action="{{ url ('guibinhluan')}}" method="get" id="commentForm">
															<div class="row">
																<div class="col-12">
																	<div class="form-group">
																		<textarea class="form-control w-100" name="txtbinhluan" id="comment" cols="30" rows="9" placeholder="Bình luận tại đây"></textarea>
																		<input name="room_id" type="hidden" value="{{$motelroom->id}}">
																	</div>
																</div>
															</div>
															<div class="form-group">
																<button type="submit" class="button button-contactForm">Gửi</button>
															</div>
														</form>
													</div>
												</div>
												@else
												<h4 class="mb-15">Bạn cần đăng nhập để bình luận</h4>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-60">
								<div class="col-12">
									<h2 class="section-title style-1 mb-30">Các phòng liên quan</h2>
								</div>
								<div class="col-12">
									<div class="row related-products">
										{{-- <div class="col-lg-3 col-md-4 col-12 col-sm-6">
											<div class="product-cart-wrap hover-up">
												<div class="product-img-action-wrap">
													<div class="product-img product-img-zoom">
														<a href="shop-product-right.html" tabindex="0">
															<img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="" />
															<img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="" />
														</a>
													</div>
													<div class="product-action-1">
														<a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-search"></i></a>
														<a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
														<a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
													</div>
													<div class="product-badges product-badges-position product-badges-mrg">
														<span class="hot">Hot</span>
													</div>
												</div>
												<div class="product-content-wrap">
													<h2><a href="shop-product-right.html" tabindex="0">Ulstra Bass Headphone</a></h2>
													<div class="rating-result" title="90%">
														<span> </span>
													</div>
													<div class="product-price">
														<span>$238.85 </span>
														<span class="old-price">$245.8</span>
													</div>
												</div>
											</div>
										</div> --}}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
						<div class="sidebar-widget widget-category-2 mb-30">
							@if(session('thongbao'))
							<div class="alert bg-success">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Thành công!</span>{{session('thongbao')}}
							</div>
							@else
							<h5 class="section-title style-1 mb-30">Gửi yêu cầu</h5>
							<ul>
								<form action="{{ route('user.yeucau',['id'=>$motelroom->id, 'user_motel'=>$motelroom->user->id]) }}">
									<label class="radio" style="margin-right:15px;"> Yêu cầu thuê
										<input style="width: 40%; height: 30px;" type="radio" checked="checked" name="yeucau" value="1">
										<span class="checkround"></span>
									</label>
									<label class="radio"> Yêu cầu đặt cọc
										<input style="width: 40%; height: 30px;" type="radio" name="yeucau" value="2">
										<span class="checkround"></span>
									</label>
									<button type="submit" class="btn btn-danger">Gửi đến chủ trọ</button>
								</form>
							</ul>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript">
	$(document).ready(function() {
		var slider = $('.pgwSlider').pgwSlider();
		slider.previousSlide();
	});
</script>
<script>

	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map-detail'), {
			center: {lat: 16.067011, lng: 108.214388},
			zoom: 15,
			draggable: true
		});
		/* Get latlng vị trí phòng trọ */
		<?php
		$arrmergeLatln = array();

		$arrlatlng = json_decode($motelroom->latlng,true);

		$arrmergeLatln[] = ["lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$motelroom->title,"address"=> $motelroom->address,"phone"=> $motelroom->phone,"slug"=>$motelroom->slug];
		$js_array = json_encode($arrmergeLatln);
		echo "var javascript_array = ". $js_array . ";\n";

		?>
		/* ---------------  */
		
		for (i in javascript_array){
			var data = javascript_array[i];
			var latlng =  new google.maps.LatLng(data.lat,data.lng);
			var phongtro = new google.maps.Marker({
				position:  latlng,
				map: map,
				title: data.title,
				icon: "images/gps.png",
				content: 'dgfdgfdg'
			});
			var infowindow = new google.maps.InfoWindow();
			(function(phongtro, data){
				var content = '<div id="iw-container">' +
				'<a href="phongtro/'+data.slug+'"><div class="iw-title">' + data.title +'</div></a>' +
				'<p><i class="fas fa-map-marker" style="color:#003352"></i> '+ data.address +'<br>'+
				'<br>Phone. ' +data.phone +'</div>';
				infowindow.setContent(content);
				infowindow.open(map, phongtro);
				google.maps.event.addListener(phongtro, "click", function(e){

					infowindow.setContent(content);
					infowindow.open(map, phongtro);
                  // alert(data.title);
              });
			})(phongtro,data);

		}
		google.maps.event.addListener(map, 'mousemove', function (e) {
			document.getElementById("flat").innerHTML = e.latLng.lat().toFixed(6);
			document.getElementById("lng").innerHTML = e.latLng.lng().toFixed(6);

		});


	}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
async defer></script>
@endsection