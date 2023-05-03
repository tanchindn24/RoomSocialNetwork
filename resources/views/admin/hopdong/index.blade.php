@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
  <div class="breadcrumb-line">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Quản lý hợp đồng</li>
    </ol>
  </div>
  <!-- /page header -->
  <div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Quản lý hợp đồng</h2>
        <div class="form-row pull-right">
          <a href="{{ route('dientro.index') }}" class="btn btn-warning btn-sm"><i class="fa fa-bolt m-right-xs mr-1"></i>Mở quản lí điện</a>
          <a href="{{ route('nuoctro.index') }}" class="btn btn-primary btn-sm"><i class="fa fa-tint m-right-xs mr-1"></i>Mở quản lí nước</a>
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
            <th>TÊN KHÁCH THUÊ</th>
            <th>PHÒNG CHO THUÊ</th>
            <th>NGÀY TẠO</th>
            <th>TRẠNG THÁI</th>
            <th>CHI TIẾT</th>
            <th>TÙY CHỌN</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($listhopdong as $hopdong)
            <tr>
              <td>{{ $hopdong->khachthuethunhat->name }}</td>
              <td>{{ $hopdong->phongtro->tenphong }}</td>
              <td>{{ date("d/m/Y", strtotime($hopdong->created_at)) }}</td>
              <td><p style="color:rgb(23, 156, 251)">Đã khai báo đầy đủ thông tin</p></td>
              <td>
                <span><a class="btn btn-outline-info btn-sm" href="{{ route('hopdong.show',$hopdong->id) }}">Chi tiết</a></span>
              </td>
              <td>
                <button type="button" class="btn btn-secondary  dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                  Lựa chọn
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('hopdong.edit',$hopdong->id) }}"><i class="fa fa-edit"></i> Thay đổi </a>
                  <form method="POST" action="{{route('hopdong.destroy',$hopdong->id)}}">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Bạn muốn xóa hợp đồng với {{ $hopdong->khachthuethunhat->name }}?');" class="dropdown-item"><i class="fa fa-trash"></i> Xóa hợp đồng</button>
                  </form>
                </div>
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