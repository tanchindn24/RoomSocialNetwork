@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-primary">Danh sách dịch vụ</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Danh sách dịch vụ</li>
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
                            <a class="btn btn-sm btn-success" href="{{ route('provider.services.create') }}">Thêm dịch
                                vụ</a>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Loại dịch vụ</th>
                                            <th scope="col">Đơn giá (VNĐ)</th>
                                            <th scope="col">Đang dùng</th>
                                            <th scope="col">Thay đổi</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($service as $value)
                                            <tr>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->belongsToServiceCategory->name }}</td>
                                                <td>{{ number_format($value->price) }}</td>
                                                @if($value->status == 1)
                                                    <td class="font-success">Sử dụng</td>
                                                @elseif($value->status == 2)
                                                    <td class="font-danger">Không sử dụng</td>
                                                @endif
                                                <td>
                                                    <a href="{{ route('provider.services.edit', $value->id) }}"><i
                                                            data-feather="edit"></i></a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('provider.services.delete', $value->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"><i
                                                                data-feather="delete"></i></button>
                                                    </form>
                                                </td>
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
        </div>
        {!! $service->links() !!}
        <!-- Container-fluid Ends-->
    </div>
@endsection
