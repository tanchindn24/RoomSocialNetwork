<!-- menu profile quick info -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Xin chào,</span>
    <h2>{{ Auth::user()->name }}</h2>
  </div>
  </div>
  <!-- /menu profile quick info -->
<!-- /main sidebar --> 			
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section active">
      <br>
      <body onload=daterealtime();>
        <h3>Hôm nay</h3>
        <h3 style="font-size:15px" id='realtime'></h3>
      </body>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> Phòng trọ <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a><i class="fa fa-building"></i> Loại phòng / Phòng<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li class="sub_menu"><a href="{{ route('loaiphong.index') }}">Loại phòng</a>
                </li>
                <li class="sub_menu"><a href="{{ route('phongtro.index') }}">Phòng</a>
                </li>
                <li><a href="{{ route('phongtro.create') }}">Thêm</a>
                </li>
              </ul>
            </li>
            {{-- <li><a href="{{ route('phongchothue.index') }}"> <i class="fa fa-home"></i>Quản lý phòng cho thuê</a>
            </li> --}}
            <li><a href="{{ route('hopdong.index') }}"> <i class="fa fa-file-text"></i> Hợp đồng </a>
            </li>
            <li><a href="{{ route('hoadon.index') }}"> <i class="fa fa-credit-card"></i> Quản lý Hóa đơn </a>
            </li>
{{--            <li><a href="{{ route('dientro.index') }}"> <i class="fa fa-bolt"></i>Số điện </a>--}}
{{--            </li>--}}
{{--            <li><a href="{{ route('nuoctro.index') }}"> <i class="fa fa-tint"></i>Số nước </a>--}}
{{--            </li>--}}
          </ul>
        </li>
        <li><a><i class="fa fa-users"></i> Khách <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{ route('khachthue.index') }}"> <i class="fa fa-users"></i> Quản lý khách thuê </a>
            </li>
            <li><a href="{{ route('admin.khachthue.tamtrutamvang') }}"> <i class="fa fa-edit"></i> Khai báo tạm trú tạm vắng </a>
            </li>
            <li><a href="{{ route('request.index') }}"> <i class="fa fa-send"></i> Yêu cầu từ khách </a>
            </li>
          </ul>
        </li>
        <li><a href="/admin/motelrooms/list"> <i class="fa fa-list"></i> Quản lý tin đăng </a>
        </li> 
        {{-- <li><a href="/admin/report"> <i class="fa fa-exclamation-triangle"></i> Báo cáo nội dung </a>
        </li> --}}
        <li><a href="/admin/thongke"> <i class="fa fa-bar-chart-o"></i> Thống kê </a>
        </li>
      </ul>
    </div>
</div>
			<!-- /main sidebar -->