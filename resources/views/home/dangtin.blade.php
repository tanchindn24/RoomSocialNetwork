@extends('layouts.master')
@section('content')
<div class="gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="entry-title entry-prop">Đăng tin</h1>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin bắt buộc*</div>
				<div class="panel-body">
					<div class="gap"></div>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if(session('warn'))
          <div class="alert bg-danger">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Lỗi!</span>  {{session('warn')}}
          </div>
          @endif
          @if(session('success'))
					<div class="alert bg-success">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<span class="text-semibold">Ok nhé!</span>  {{session('success')}}
					</div>
					@endif
          @if(Auth::user()->tinhtrang != 0)
					<form action="{{ route ('user.dangtin') }}" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="usr">Tiêu đề bài đăng:</label>
							<input type="text" class="form-control" name="txttitle">
						</div>
						<div class="form-group">
							<label>Địa chỉ:</label> Bạn có thể nhập hoặc chọn ví trí trên bản đồ
							<input type="text" id="txtaddress" name="txtaddress" class="form-control" value="" placeholder="Nhập địa chỉ" />
              <p><i class="far fa-bell"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="usr">Giá phòng( vnđ ):</label>
                  <input type="text" id="" name="txtprice" class="form-control" placeholder="Nhập giá phòng.." >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="usr">Diện tích( m<sup>2</sup> ):</label>
                  <input type="number" name="txtarea" class="form-control" placeholder="Nhập diện tích">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="usr">Quận/ Huyện:</label>
                  <select class="selectpicker pull-right" data-live-search="true" name="iddistrict">
                    @foreach($district as $quan)
                    <option data-tokens="{{$quan->slug}}" value="{{ $quan->id }}">{{ $quan->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="usr">Danh mục:</label>
                  <select class="selectpicker pull-right" data-live-search="true" class="form-control" name="idcategory"> 
                    @foreach($categories as $category)
                    <option data-tokens="{{$category->slug}}" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="usr">SĐT Liên hệ:</label>
                  <input type="text" name="txtphone" class="form-control" placeholder="SĐT liên hệ..">
                </div>
              </div>
            </div> 
            <div class="form-group">
              <!-- ************** Max Items Demo ************** -->
              <label>Các tiện ích:</label>
              <select id="select-state" name="tienich[]" multiple class="demo-default" placeholder="Chọn các tiện ích phòng trọ">
                <option value="Wifi miễn phí">Wifi miễn phí</option>
                <option value="Có gác lửng">Có gác lửng</option>
                <option value="Tủ + giường">Tủ + giường</option>
                <option value="Không chung chủ">Không chung chủ</option>
                <option value="Chung chủ" >Chung chủ</option>
                <option value="Giờ giấc tự do">Giờ giấc tự do</option>
                <option value="Vệ sinh riêng">Vệ sinh riêng</option>
                <option value="Vệ sinh chung">Vệ sinh chung</option>
              </select>
            </div>
            <div class="form-group">
              <label for="comment">Thông tin mô tả:</label>
              <textarea class="form-control" rows="5" name="txtdescription" style=" resize: none;"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Thêm hình ảnh:</label>
              <div class="file-loading">
                <input id="file-5" type="file" class="file" name="hinhanh[]" multiple data-preview-file-type="any" data-upload-url="#">
              </div>
            </div>
            <button class="btn btn-primary">Đăng Tin</button>
          </form>
          @else
          <div class="alert bg-danger">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Lỗi!</span>  Tài khoản của bạn đang bị khóa đăng tin.
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4">
     <div class="contactpanel">
      <div class="row">
       <div class="col-md-4 text-center">
        <img src="public/uploads/avatars/{{ Auth::user()->avatar }}" class="img-circle" alt="Cinque Terre" width="100" height="100"> 
      </div>
      <div class="col-md-8">
        <h4>Thông tin người đăng</h4>
        <strong> {{ Auth::user()->name }}</strong><br>
        <i class="far fa-clock"></i> Ngày tham gia: {{ Auth::user()->created_at }}	

      </div>
    </div>
  </div>
  <div class="gap"></div>
</div>
</div>
</div>
<script type="text/javascript">
$("input[id='formatnumber']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});
function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}
function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  // get input value
  var input_val = input.val();
  // don't validate empty input
  if (input_val === "") { return; }
  // original length
  var original_len = input_val.length;
  // initial caret position 
  var caret_pos = input.prop("selectionStart");
  // check for decimal
  if (input_val.indexOf(".") >= 0) {
    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");
    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);
    // add commas to left side of number
    left_side = formatNumber(left_side);
    // validate right side
    right_side = formatNumber(right_side);
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);
    // join number by .
    input_val =  left_side + "." + right_side;
  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    input_val = input_val;
    // final formatting
    if (blur === "blur") {
      input_val += "";
    }
  }
  // send updated string to input
  input.val(input_val);
  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>
<script type="text/javascript">
  $('#file-5').fileinput({
    theme: 'fa',
    language: 'vi',
    showUpload: false,
    allowedFileExtensions: ['jpg', 'png', 'gif']
  });
</script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW6mnr2uV6B9H9kFlkECWsbcX3ZLrmh_gE&callback=initialize&libraries=geometry,places" async defer>
</script>
{{--<script>--}}
{{--goongjs.accessToken = 'SRtuCtj7sVvYjjS59n4WJIaHoNoERcaZ8XYopWQZ';--}}
{{--var map = new goongjs.Map({--}}
{{--  container: 'map',--}}
{{--  style: 'https://tiles.goong.io/assets/goong_map_web.json', // stylesheet location--}}
{{--  center: [108.2053320454115, 16.05425959957465], // starting position [lng, lat]--}}
{{--  zoom: 10 // starting zoom--}}
{{--});--}}
{{--</script>--}}
<script>
  var map;
  var marker;
  function initialize() {
    var mapOptions = {
      center: {lat: 21.034031, lng: 105.814262},
      zoom: 12
    };
    map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Get GEOLOCATION
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
        position.coords.longitude);
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({
        'latLng': pos
      }, function (results, status) {
        if (status ==
          google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            console.log(results[0].formatted_address);
          } else {
            console.log('No results found');
          }
        } else {
          console.log('Geocoder failed due to: ' + status);
        }
      });
      map.setCenter(pos);
      marker = new google.maps.Marker({
        position: pos,
        map: map,
        draggable: true
      });
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }

  function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
      var content = 'Error: The Geolocation service failed.';
    } else {
      var content = 'Error: Your browser doesn\'t support geolocation.';
    }

    var options = {
      map: map,
      zoom: 19,
      position: new google.maps.LatLng(21.034031,105.814262),
      content: content
    };

    map.setCenter(options.position);
    marker = new google.maps.Marker({
      position: options.position,
      map: map,
      zoom: 19,
      icon: "images/gps.png",
      draggable: true
    });
    /* Dragend Marker */
    google.maps.event.addListener(marker, 'dragend', function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#location-text-box').val(results[0].formatted_address);
            $('#txtaddress').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
    /* End Dragend */

  }

  // get places auto-complete when user type in location-text-box
  var input = /** @type {HTMLInputElement} */
  (
    document.getElementById('location-text-box'));


  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow();
  marker = new google.maps.Marker({
    map: map,
    icon: "images/gps.png",
    anchorPoint: new google.maps.Point(0, -29),
    draggable: true
  });

  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    marker.setVisible(false);
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': place.geometry.location}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#txtaddress').val(results[0].formatted_address);
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        }
      }
    });
    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17); // Why 17? Because it looks good.
    }
    marker.setIcon( /** @type {google.maps.Icon} */ ({
      url: "images/gps.png"
    }));
    document.getElementById('txtlat').value = place.geometry.location.lat();
    document.getElementById('txtlng').value = place.geometry.location.lng();
    console.log(place.geometry.location.lat());
    marker.setPosition(place.geometry.location);
    marker.setVisible(true);

    var address = '';
    if (place.address_components) {
      address = [
      (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
      ].join(' ');
    }
    /* Dragend Marker */
    google.maps.event.addListener(marker, 'dragend', function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            $('#location-text-box').val(results[0].formatted_address);
            $('#txtlat').val(marker.getPosition().lat());
            $('#txtlng').val(marker.getPosition().lng());
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
          }
        }
      });
    });
    /* End Dragend */
  });

}


// google.maps.event.addDomListener(window, 'load', initialize);
</script>
<script type="text/javascript" src="assets/js/selectize.js"></script>
<script>
  $(function() {
    $('select').selectize(options);
  });
  $('#select-state').selectize({
    maxItems: null
  });
</script>
@endsection