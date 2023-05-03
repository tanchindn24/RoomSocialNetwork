@extends('layouts.chutro.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Quản lý danh sách phòng</h2>
                <p>Tất cả danh sách phòng trong nhà trọ <b style="font-style: italic;font-weight: bold">{{$nhatro->ten_nhatro}}</b> </p>
            </div>
            <div>
                <input type="text" placeholder="Search order ID" class="form-control bg-white" />
            </div>
        </div>
        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-2 col-6 col-md-3">
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="chutro/phongtro/{{$nhatro->id}}">{{$nhatro->ten_nhatro}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Tầng</th>
                            <th scope="col">Tên Phòng</th>
                            <th scope="col">Giá Thuê</th>
                            <th scope="col">Tiền cọc</th>
                            <th scope="col">Tiền nợ</th>
                            <th scope="col">Khách thuê</th>
                            <th scope="col">Ngày lập phiếu</th>
                            <th scope="col">Chu kỳ thu tiền</th>
                            <th scope="col">Ngày vào ở</th>
                            <th scope="col">Thời hạn hợp đồng</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Tài chính</th>
                            <th scope="col" class="text-end">Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dsphong as $phong)
                        <tr>
                            <td><img src="/public/assets/back-end/imgs/icons/house.png"></td>
                            <td><b>{{$phong->ten_tang}}</b></td>
                            <td>{{$phong->ten_phong}}</td>
                            <td>{{$phong->gia}} đ</td>
                            <td>0 đ</td>
                            <td>0 đ</td>
                            <td><i class="fa-solid fa-user"></i>0/{{$phong->so_nguoi}}</td>
                            <td>Ngày {{$phong->ngaylap_hoadon}}</td>
                            <td>1 Tháng</td>
                            <td style="background: #ffe7e7">Chưa vào ở</td>
                            <td>Vô thời hạn</td>
                            <td><span class="badge rounded-pill alert-danger">Còn trống</span></td>
                            <td><span class="badge rounded-pill alert-success">Chờ kỳ thu tới</span></td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Chi tiết phòng</a>
                                        <a class="dropdown-item" href="#">Hợp đồng mới</a>
                                        <a class="dropdown-item" href="#">Cọc giữ chỗ</a>
                                        <a class="dropdown-item" href="#">Cài đặt dịch vụ</a>
                                        <a class="dropdown-item text-danger" href="#">Xóa phòng</a>
                                    </div>
                                </div>
                                <!-- dropdown //end -->
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table-responsive //end -->
            </div>
            <!-- card-body end// -->
        </div>
        <!-- card end// -->
{{--        <div class="pagination-area mt-15 mb-50">--}}
{{--            <nav aria-label="Page navigation example">--}}
{{--                <ul class="pagination justify-content-start">--}}
{{--                    <li class="page-item active"><a class="page-link" href="#">01</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">02</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">03</a></li>--}}
{{--                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>--}}
{{--                    <li class="page-item"><a class="page-link" href="#">16</a></li>--}}
{{--                    <li class="page-item">--}}
{{--                        <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </nav>--}}
{{--        </div>--}}
    </section>
@endsection
