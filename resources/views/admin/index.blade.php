@extends('admin.layout.master')
@section('content2')

<!-- top tiles -->
<div class="row" style="display: inline-block;" >
  <div class="tile_count">
    <div class="col-md-3 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Phòng trọ</span>
      <div class="count">{{ $phong_tro }}</div>
    </div>
    <div class="col-md-3 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Người thuê trọ</span>
      <div class="count">{{ $khach_thue }}</div>
      <span class="count_bottom"><i class="green">trên tổng số {{ $phong_tro }} phòng trọ </i></span>
    </div>
    <div class="col-md-3 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Phòng đang cho thuê</span>
      <div class="count">{{ $phong_cho_thue }}</div>
      <span class="count_bottom"><i class="green">trên tổng số {{ $phong_tro }} phòng trọ</i></span>
    </div>
    <div class="col-md-3 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Hợp đồng đã lập</span>
      <div class="count">{{ $hop_dong }}</div>
    </div>
    <div class="col-md-4 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Hóa đơn đã thanh toán</span>
      <div class="count">{{ $cout_hoadon_thanhtoan }}</div>
      <span class="count_bottom"><i class="green">trên tổng số {{ $count_hoadon }} hóa đơn</i></span>
    </div>
  </div>
</div>
  <!-- /top tiles -->
  {{-- Dashboard 1 --}}
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="dashboard_graph">

        <div class="x_title">
          <h2>Thống kê <small>Chi tiết</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <table class="" style="width:50%">
          <tr>
            <th style="width:30%;">
              <p>Biểu đồ chi tiết</p>
            </th>
            <th>
              <div class="col-lg-7 col-md-7 col-sm-7 ">
                <p class="">Mô tả</p>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 ">
                <p class="">Chi tiết</p>
              </div>
            </th>
          </tr>
          <tr>
              <td>
                  <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                </td>
            <td>
              <table class="tile_info">
                <tr>
                  <td>
                    <p><i class="fa fa-square blue" style="color: #00BFFF"></i>Khách thuê </p>
                  </td>
                  <td>{{ $khach_thue }}</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square blue" style="color:#97FFFF"></i>Phòng trọ </p>
                  </td>
                  <td>{{ $phong_tro }}</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square" style="color:#00FF00"></i>Phòng cho thuê </p>
                  </td>
                  <td>{{ $phong_cho_thue }}</td>
                </tr>
                <tr>
                  <td>
                    <p><i class="fa fa-square" style="color:#FF3030"></i>Hợp đồng </p>
                  </td>
                  <td>{{ $hop_dong }}</td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        </div>

        <div class="clearfix"></div>
      </div>
    </div>

  </div>
  <br />

  {{-- Dashborad 2 --}}
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="dashboard_graph">

        <div class="row x_title">
          <div class="col-md-6">
            <h3>Thống kê <small>Chi tiết</small></h3>
          </div>
          <div class="col-md-6">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
              <span>{{ date("d/m/Y") }}</span> <b class="caret"></b>
            </div>
          </div>
        </div>

        <div class="col-md-9 col-sm-9 ">
          <div id="chart_plot_01" class="demo-placeholder"></div>
        </div>
        <div class="col-md-3 col-sm-3  bg-white">
          <div class="x_title">
            <h2>thống kê hóa đơn & ghi nợ</h2>
            <div class="clearfix"></div>
          </div>

          <div class="col-md-12 col-sm-12 ">
            <div>
              <p>Hóa đơn tiền trọ đã thu</p>
              <div class="">
                <div class="progress progress_sm" style="width: 76%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="0"></div>
                </div>
              </div>
            </div>
            <div>
              <p>Hóa đơn tiền trọ chưa thu</p>
              <div class="">
                <div class="progress progress_sm" style="width: 76%;">
                  <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>
      </div>
    </div>

  </div>
  <br />
  <script type="text/javascript">
    var phongtro ='{!! json_encode($phong_tro) !!}';
    var khachthue ='{!! json_encode($khach_thue) !!}';
    var phongchothue ='{!! json_encode($phong_cho_thue) !!}';
    var hopdong = '{!! json_encode($hop_dong)!!}';
  </script>
@endsection