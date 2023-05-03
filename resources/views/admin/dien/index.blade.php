@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
  <div class="breadcrumb-line">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Danh sách số điện</li>
    </ol>
  </div>
  <!-- /page header -->
  <div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Quản lý số điện phòng trọ</h2>
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
        <table class="table table-hover jambo_table">
          <thead>
          <tr>
            <th>PHÒNG</th>
            <th>TÊN KHÁCH THUÊ</th>
            <th>SỐ ĐIỆN BAN ĐẦU</th>
            <th>LIÊN HỆ</th>
            <th>TÙY CHỌN</th>
          </tr>
          </thead>
          <tbody>
          @foreach($hopdong as $dien)
            <tr>
              <td>{{ $dien->phongtro->tenphong }}</td>
              <td>{{ $dien->khachthuethunhat->name }}</td>
              <td>{{ $dien->sodienbandau }}</td>
              <td>{{ $dien->khachthuethunhat->sdt }}</td>
              <td>
                  <a class="btn btn-success" rel="facebox" href="{{ route('dientro.edit', $dien->id) }}" ><i class="fa fa-pencil-square"></i> Nhập </a>
                  <a class="btn btn-primary" rel="facebox" href="{{ route('dientro.show', $dien->id) }}"><i class="fa fa-folder"></i> Chi tiết </a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection