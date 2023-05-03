@extends('layouts.admin.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Quản lí các tài khoản chủ trọ</h2>
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
                    <div class="col-md-2 col-6">
                        <input type="date" value="02.05.2021" class="form-control" />
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                @foreach($account_chutro as $account)
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
                                        <img src="/public/assets/back-end/imgs/avatar/{{$account->avatar}}" class="img-sm img-thumbnail" alt="Item" />
                                    </div>
                                    <div class="info">
                                        <h6 class="mb-0">{{$account->name}}</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-sm-2 col-4 col-price"><span>{{$account->email}}</span></div>
                            <div class="col-lg-1 col-sm-2 col-4 col-date">
                                <span>{{date('d.m.Y', strtotime($account->created_at))}}</span>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                                <a href="#" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Khóa </a>
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
