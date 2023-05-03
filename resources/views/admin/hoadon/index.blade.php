@extends('admin.layout.master')
@section('content2')

  <!-- Main content -->
  <div class="content-wrapper">
    <div class="breadcrumb-line">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách hóa đơn</li>
      </ol>
    </div>
    <!-- /page header -->
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Danh sách hóa đơn phòng trọ</h2>
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
              <th>TRẠNG THÁI</th>
              <th>PHÒNG</th>
              <th>TÊN KHÁCH THUÊ</th>
              <th>THÁNG</th>
              <th>LIÊN HỆ</th>
              <th>CHI TIẾT</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($lshoadon as $lshoadon)
                <tr>
                  <td>
                    @if($lshoadon->trang_thai==1)
                    <span style="color:rgb(255, 28, 28);font-weight:bold">Chưa xử lý</span>
                    @elseif ($lshoadon->trang_thai==2)
                    <span style="color:rgb(11, 254, 40);font-weight:bold">Đã xử lý</span>
                    @endif
                  </td>
                  <td>{{ $lshoadon->hopdong->phongtro->tenphong }}</td>
                  <td>{{ $lshoadon->hopdong->khachthuethunhat->name }}</td>
                  <td>{{ date('m/Y',strtotime($lshoadon->ngaytao)) }}</td>
                  <td>{{ $lshoadon->hopdong->khachthuethunhat->sdt }}</td>
                  <td><a href="{{ route('hoadon.show', $lshoadon->id) }}">Mở</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection