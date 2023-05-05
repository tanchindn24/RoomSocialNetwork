@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Service list</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Services list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                @if(session('notification'))
                    <div class="alert alert-danger">
                        {{ session('notification') }}
                    </div>
                @endif
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success" href="{{ route('provider.services.create') }}">Thêm dịch vụ</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive product-table">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Tên</th>
                                        <th>Loại dịch vụ</th>
                                        <th>Đơn giá (VNĐ)</th>
                                        <th>Đang dùng</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($service as $value)
                                    <tr>
                                        <td>
                                            <form id="lock-form-{{ $value->id }}" action="{{ route('provider.services.delete', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                            </form>
                                            <a class="btn btn-success btn-sm" type="button" href="{{ route('provider.services.edit', $value->id) }}" data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                        </td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->belongsToServiceCategory->name }}</td>
                                        <td>{{ number_format($value->price) }}</td>
                                        @if($value->status == 1)
                                            <td class="font-success">Sử dụng</td>
                                        @elseif($value->status == 2)
                                            <td class="font-danger">Không sử dụng</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Individual column searching (text inputs) Ends-->
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
