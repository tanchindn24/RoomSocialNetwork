@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
    
    <!-- /page header -->
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Khai báo tạm trú tạm vắng</h2>
          <div class="nav navbar-right panel_toolbox">
            <a class="pull-right btn btn-info btn-sm" href="{{route('admin.khachthue.khaibaotamtru')}}"><i class="fa fa-plus"></i> Khai báo</a>
          </div>
          @if(session('thongbao'))
            <div class="alert alert-success alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Thông báo!</strong> {{session('thongbao')}}.
            </div>
          @endif
          <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover jambo_table bulk_action">
            <thead>
            <tr>
              <th>HỌ & TÊN</th>
              <th>SINH NGÀY</th>
              <th>SỐ ĐIỆN THOẠI</th>
              <th>CHỦ HỘ</th>
              <th>ĐIỆN THOẠI CHỦ HỘ</th>
              <th>TỪ NGÀY</th>
              <th>TRẠNG THÁI</th>
              <th>NGÀY KHAI BÁO</th>
              <th>IN</th>
            </tr>
            </thead>
            <tbody>
              @foreach($listtamtru as $tamtru)
                <tr>
                  <td>{{ $tamtru->khachthue->name }}</td>
                  <td>{{ date('d/m/Y', strtotime($tamtru->khachthue->ngaysinh)) }}</td>
                  <td>{{ $tamtru->khachthue->sdt }}</td>
                  <td>{{ $tamtru->chuho }}</td>
                  <td>{{ $tamtru->sdtchuho }}</td>
                  <td>{{ date('d/m/Y', strtotime($tamtru->thoigian)) }}</td>
                  <td>
                    @if($tamtru->trangthai == 1)
                      <p style="color:rgb(23, 156, 251)">Đã khai báo</p>
                    @elseif($tamtru->trangthai == 0)
                      <p style="color:red;font-weight:bold">Chưa khai báo</p>
                    @endif
                  </td>
                  <td>{{ date('d/m/Y', strtotime($tamtru->created_at)) }}</td>
                  <td><a href="{{ route('admin.xuattamtru', $tamtru->id) }}"><i class="fa fa-print"></i></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection