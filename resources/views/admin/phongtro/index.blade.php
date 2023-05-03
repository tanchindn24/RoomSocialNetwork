@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">Quản lí phòng trọ</li>
        </ol>
	</div>
    <!-- /page header -->
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
          @if(session('thongbao'))
            <div class="alert alert-success alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Thông báo!</strong> {{session('thongbao')}}.
            </div>
          @endif
          <div class="clearfix"></div>
          <div class="x_content">
              <button type="button" class="btn btn-primary"><b>Phòng cho thuê: </b>{{ $chothue }}</button>
              <button type="button" class="btn btn-success"><b>Phòng trống: </b>{{ $trong }}</button>
              <button type="button" class="btn btn-warning"><b>Phòng đặt cọc: </b>{{ $datcoc }}</button>
            <br>
              <button type="button" class="btn btn-info"><b>Phòng đang dọn dẹp: </b>{{ $dondep }}</button>
              <button type="button" class="btn btn-danger"><b>Phòng đang sửa chữa: </b>{{ $suachua }}</button>
              <button type="button" class="btn btn-dark"><b>Phòng tạm khóa: </b>{{ $khoa }}</button>
          </div>
          </div>
          <div class="clearfix"></div>
        </div>
        {{-- List --}}
        <div class="table-responsive col-md-12 col-sm-12">
          <table class="table table-hover jambo_table bulk_action">
            <thead>
            <tr>
              <th>PHÒNG</th>
              {{-- <th>LOẠI</th> --}}
              <th>GIÁ</th>
              {{-- <th>ĐỊA CHỈ</th>
              <th>DIỆN TÍCH</th> --}}
              <th>GIÁ ĐIỆN</th>
              <th>GIÁ NƯỚC</th>
              <th>TÌNH TRẠNG</th>
              <th>TÙY CHỌN</th>
              <th>GHI CHÚ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listphongtro as $phong)
            <tr>
              <td>{{ $phong->tenphong }}</td>
              {{-- <td>{{ $phong->loaiphongtro->ten }}</td> --}}
              <td>{{ number_format($phong->gia) }} đ</td>
              {{-- <td>{{ substr( $phong->diachi, 0, 40 ) }}...</td>
              <td>{{ $phong->dientich }}</td> --}}
              <td>{{ number_format($phong->tiendien) }} /kWh</td>
              <td>{{ number_format($phong->tiennuoc) }} /m3</td>
              <td>
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                  @if($phong->tinhtrang->id==1)
                    <span class="btn btn-success btn-sm"> phòng trống </span>
                  @elseif($phong->tinhtrang->id==2)
                    <span class="btn btn-danger btn-sm"> phòng đang<br>sửa chữa </span>
                  @elseif($phong->tinhtrang->id==3)
                    <span class="btn btn-info btn-sm"> phòng đang<br>dọn dẹp </span>
                  @elseif($phong->tinhtrang->id==4)
                    <span class="btn btn-warning btn-sm"> phòng đã<br>có đặt cọc </span>
                  @elseif($phong->tinhtrang->id==5)
                    <span class="btn btn-primary btn-sm"> phòng cho thuê </span>
                  @elseif($phong->tinhtrang->id==6)
                    <span class="btn btn-dark btn-sm"> phòng tạm khóa </span>
                  @endif
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('phongtro.trong', $phong->id)}}"> phòng trống</a>
                  <a class="dropdown-item" href="{{route('phongtro.suachua', $phong->id)}}"> sửa chữa phòng</a>
                  <a class="dropdown-item" href="{{route('phongtro.dondep', $phong->id)}}"> dọn dẹp phòng</a>
                  <a class="dropdown-item" href="{{route('phongtro.datcoc', $phong->id)}}"> phòng có đặt cọc</a>
                  <a class="dropdown-item" href="{{route('phongtro.chothue', $phong->id)}}"> phòng cho thuê</a>
                  <a class="dropdown-item" href="{{route('phongtro.khoa', $phong->id)}}"> khóa phòng</a>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-secondary  dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                  Lựa chọn
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('phongtro.edit', $phong->id) }}"><i class="fa fa-edit"></i> Thay đổi </a>
                    <form method="POST" action="{{ route('phongtro.destroy',$phong->id) }}">
                      @method('DELETE')
                      @csrf
                      <button onclick="return confirm('Bạn muốn xóa {{ $phong->tenphong }}?');" class="dropdown-item"><i class="fa fa-trash"></i> Xóa</button>
                    </form>
                  @if($phong->tinhtrang->id==1)
                    <a class="dropdown-item" href="{{ route('admin.hopdong.taohopdong', $phong->id) }}"><i class="fa fa-edit"></i> Tạo hợp đồng </a>
                  @endif
                </div>
              </td>
              <td>
                <i class="fa fa-edit dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                  Ghi chú
                </i>
                <div class="dropdown-menu">
                  <textarea></textarea>
                </div>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          {{ $listphongtro->links() }}
      </div>
    </div>
</div>
@endsection