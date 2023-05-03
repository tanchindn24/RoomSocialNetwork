@extends('layouts.admin.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Quản lí các bài viết</h2>
                <p>Quản lí toàn bộ bài viết của chủ trọ tại đây.</p>
            </div>
        </div>
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
        <div class="card mb-4">
            <header class="card-header">
                <div class="row align-items-center">
                    <div class="col col-check flex-grow-0">
                        <div class="form-check ms-2">
                            <input class="form-check-input" type="checkbox" value="" />
                        </div>
                    </div>
                    <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                        <select class="form-select">
                            <option selected>Tất cả danh mục</option>
                            @foreach($list_danhmuc as $list_danhmuc)
                                <option>{{$list_danhmuc->loai}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="date" value="02.05.2021" class="form-control" />
                    </div>
                    <div class="col-md-2 col-6">
                        <select class="form-select">
                            <option selected>Tất cả chủ trọ</option>
                            @foreach($list_chutro as $list_chutro)
                                <option>{{$list_chutro->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                @foreach($list_baiviet as $list)
                <article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col col-check flex-grow-0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                            <a class="itemside" href="#">
                                <div class="left">
                                    <img src="{{ URL::asset('public/assets/front-end/imgs/baiviet/no-images-baiviet.jpg') }}" class="img-sm img-thumbnail" alt="Item" />
                                </div>
                                <div class="info">
                                    <h6 class="mb-0">{{substr($list->tieu_de,0,50)}}...</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-price"><span>{{number_format($list->gia)}}đ</span></div>
                        <div class="col-lg-2 col-sm-2 col-4 col-status">
                            @if($list->trang_thai==1)
                                <span class="badge rounded-pill alert-success">Đã xác minh</span>
                            @elseif($list->trang_thai==2)
                                <span class="badge rounded-pill alert-danger">Đã khóa</span>
                            @endif
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 col-date">
                            <span>{{date('d.m.Y', strtotime($list->created_at))}}</span>
                        </div>
                        <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                            @if($list->trang_thai==1)
                                <a href="{{route('khoa-baiviet',$list->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-lock"></i> Khóa tin </a>
                            @elseif($list->trang_thai==2)
                                <a href="{{route('xacminh-baiviet',$list->id)}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-open_with"></i> Xác minh </a>
                            @endif
                            <a href="#" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Xóa </a>
                        </div>
                    </div>
                    <!-- row .// -->
                </article>
                @endforeach
                <!-- itemlist  .// -->
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
