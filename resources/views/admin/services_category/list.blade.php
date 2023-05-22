@extends('layout.admin.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Danh sách loại dịch vụ</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"> <i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Danh sách loại dịch vụ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            @if (session('notification'))
                <script>alert('{{ session('notification') }}');</script>
            @endif
            <div class="row">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="txt-success">Danh sách loại dịch vụ</h6>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class="table-primary">
                                        <tr>
                                            <th></th>
                                            <th>Tên</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category as $value)
                                            <tr>
                                                <td>
                                                    @if($value->status == 1)
                                                        <form id="lock-form-{{ $value->id }}"
                                                              action="{{ route('admin.serviceCategory.inactive', $value->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-danger btn-xs" type="submit">Khóa
                                                            </button>
                                                        </form>
                                                    @elseif($value->status == 2)
                                                        <form id="lock-form-{{ $value->id }}"
                                                              action="{{ route('admin.serviceCategory.active', $value->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-success btn-xs" type="submit">Mở
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>{{ $value->name }}</td>
                                                @if($value->status == 1)
                                                    <td class="font-success">Đang Dùng</td>
                                                @elseif($value->status == 2)
                                                    <td class="font-danger">Khóa</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h6>Thêm</h6>
                        </div>
                        <form class="form theme-form" action="{{ route('admin.serviceCategory.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleName">Tên</label>
                                            <input
                                                name="name"
                                                class="form-control" id="exampleName" type="text"
                                                placeholder="name...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlSelect9">Trạng thái</label>
                                            <select name="status" class="form-select digits"
                                                    id="exampleFormControlSelect9">
                                                <option value="1">Sử Dụng</option>
                                                <option value="2">Khóa</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary" type="submit">Thêm</button>
                                <input class="btn btn-light" type="reset" value="Hủy">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
