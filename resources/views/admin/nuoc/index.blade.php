@extends('admin.layout.master')
@section('content2')

    <!-- Main content -->
    <div class="content-wrapper">
        <div class="breadcrumb-line">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách số nước</li>
            </ol>
        </div>
        <!-- /page header -->
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Quản lý số nước phòng trọ</h2>
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
                            <th>PHÒNG</th>
                            <th>TÊN KHÁCH THUÊ</th>
                            <th>SỐ NƯỚC BAN ĐẦU</th>
                            <th>LIÊN HỆ</th>
                            <th>TÙY CHỌN</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nuoc as $nuoc)
                            <tr>
                                <td>{{ $nuoc->phongtro->tenphong }}</td>
                                <td>{{ $nuoc->khachthuethunhat->name }}</td>
                                <td>{{ $nuoc->sonuocbandau }}</td>
                                <td>{{ $nuoc->khachthuethunhat->sdt }}</td>
                                <td>
                                    <a class="btn btn-success" rel="facebox" href="{{ route('nuoctro.edit', $nuoc->id) }}" ><i class="fa fa-pencil-square"></i> Nhập </a>
                                    <a class="btn btn-primary" rel="facebox" href="{{ route('nuoctro.show', $nuoc->id) }}"><i class="fa fa-folder"></i> Chi tiết </a>
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