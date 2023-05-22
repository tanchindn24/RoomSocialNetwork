@extends('layout.admin.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Danh sách mục bài viết</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}"> <i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Danh sách mục bài viết</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="txt-success">Danh sách mục bài viết</h5>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class="table-primary">
                                        <tr>
                                            <th>Tên</th>
                                            <th>Số bài viết đã tạo</th>
                                            <th>Trạng thái</th>
                                            <th>Tùy chọn</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($categories as $value)
                                            <tr>
                                                <td>
                                                    <h6> {{$value->name}} </h6><span>{{$value->slug}}</span>
                                                </td>
                                                <td>{{ $value->Posts->count() }}</td>
                                                @if($value->status == 1)
                                                    <td class="font-success">Mở</td>
                                                @else
                                                    <td class="font-danger">Khóa</td>
                                                @endif
                                                <td>
                                                    <button class="btn btn-danger btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title="">Xóa
                                                    </button>
                                                    <button class="btn btn-success btn-xs" type="button"
                                                            data-original-title="btn btn-danger btn-xs" title="">Thay đổi
                                                    </button>
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
            <!-- Container-fluid Ends-->
        </div>
    </div>
@endsection
