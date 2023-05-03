@extends('layouts.chutro.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Quản lí bài viết</h2>
                <p>Quản lí bài viết của bạn tại đây.</p>
            </div>
{{--            <div>--}}
{{--                <a href="#" class="btn btn-light rounded font-md">Export</a>--}}
{{--            </div>--}}
        </div>
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-4 col-md-6 me-auto">
                        <input type="text" placeholder="Search..." class="form-control" />
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Tất cả danh mục</option>
                            @foreach($list_danhmuc as $list_danhmuc)
                                <option>{{$list_danhmuc->loai}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div class="col-lg-2 col-6 col-md-3">--}}
{{--                        <select class="form-select">--}}
{{--                            <option>Latest added</option>--}}
{{--                            <option>Cheap first</option>--}}
{{--                            <option>Most viewed</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                <div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
                    @foreach($list as $list)
                    <div class="col">
                        <div class="card card-product-grid">
                            <a href="#" class="img-wrap"> <img src="{{ URL::asset('public/assets/front-end/imgs/baiviet/no-images-baiviet.jpg') }}" alt="Product" /> </a>
                            <div class="info-wrap">
                                <a href="#" class="title text-truncate">{{substr($list->tieu_de, 0,22)}}...</a>
                                <div class="price mb-2">{{number_format($list->gia)}}đ</div>
                                <!-- price.// -->
                                <a href="#" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Sửa </a>
                                <a href="#" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Xóa </a>
                            </div>
                        </div>
                        <!-- card-product  end// -->
                    </div>
                    @endforeach
                    <!-- col.// -->
                </div>
                <!-- row.// -->
            </div>

            <!-- card-body end// -->
        </div>

        <!-- card end// -->
        <div class="pagination-area mt-30 mb-50">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-start">
                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
@endsection
