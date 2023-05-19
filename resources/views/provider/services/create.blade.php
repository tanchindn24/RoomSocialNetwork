@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-success">Thêm dịch vụ</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Thêm dịch vụ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Thêm dịch vụ</h5>
                        </div>
                        <form class="form theme-form" action="{{ route('provider.services.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Tên</label>
                                            <input
                                                name="name"
                                                class="form-control" id="exampleFormControlInput1" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputPrice2">Đơn giá</label>
                                            <input
                                                name="price"
                                                class="form-control" id="exampleInputPrice2" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Loại</label>
                                            <select name="category" class="form-select digits" id="exampleFormControlSelect9">
                                                @foreach($category as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect3">Status</label>
                                            <select name="status" class="form-select digits" id="exampleFormControlSelect3">
                                                <option value="1">Sử dụng</option>
                                                <option value="2">Khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div>
                                            <label class="form-label" for="exampleFormControlTextarea4">Ghi chú</label>
                                            <textarea name="note" class="form-control" id="exampleFormControlTextarea4" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-success" type="submit">Thêm</button>
                                <a class="btn btn-danger" href="{{ route('provider.services.list') }}">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
