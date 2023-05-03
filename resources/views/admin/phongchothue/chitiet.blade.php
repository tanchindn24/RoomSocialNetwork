@extends('admin.layout.master')
@section('content2')
    <div class="content-wrapper">
        <div class="breadcrumb-line">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('phongchothue.index') }}">Phòng trọ đang cho thuê</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm số khách thuê</li>
            </ol>
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Quản lý phòng đang thuê</h2>
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
                                <th>DIỆN TÍCH PHÒNG</th>
                                <th>GIÁ GỐC</th>
                                <th>GIÁ ĐIỆN</th>
                                <th>GIÁ NƯỚC</th>
                                <th>GIÁ THAY ĐỔI</th>
                                <th>SDT LH KHÁCH</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $khachthuephong->phongtro->tenphong }}</td>
                                    <td>
                                        {{ $khachthuephong->khachthueone->name }} (đứng tên hợp đồng)<br>
                                        @if ($khachthuephong->khachthue2_id != 0)
                                        {{ $khachthuephong->khachthuetwo->name }} <br>
                                        @endif
                                        @if ($khachthuephong->khachthue3_id != 0)
                                        {{ $khachthuephong->khachthuethree->name }}
                                        @endif
                                    </td>
                                    <td>{{ number_format($khachthuephong->phongtro->dientich) }} m2</td>
                                    <td>{{ number_format($khachthuephong->phongtro->gia) }} đ</td>
                                    <td>{{ number_format($khachthuephong->phongtro->tiendien) }} đ</td>
                                    <td>{{ number_format($khachthuephong->phongtro->tiennuoc) }} đ</td>
                                    <td>{{ number_format($giathaydoi->giathaydoi) }} đ</td>
                                    <td>{{ $khachthuephong->khachthueone->sdt }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection