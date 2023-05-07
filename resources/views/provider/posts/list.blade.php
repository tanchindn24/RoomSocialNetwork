@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Posts list</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Posts list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                @if(session('notification'))
                    <script>alert('{{ session('notification') }}')</script>
                @endif
                <!-- Individual column searching (text inputs) Starts-->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success" href="{{ route('provider.posts.create') }}">Tạo bài viết</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive product-table">
                                <table class="display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ảnh</th>
                                        <th>Tiêu đề</th>
                                        <th>Mục bài viết</th>
                                        <th>Lượt xem</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listPost as $value)
                                        <tr>
                                            <td>
                                                <form id="lock-form-{{ $value->id }}" action="{{ route('provider.posts.delete', $value->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                                </form>
                                                <a class="btn btn-success btn-sm" type="button" href="{{ route('provider.posts.edit', $value->id) }}" data-original-title="btn btn-danger btn-xs" title="">Edit</a>
                                            </td>
                                            <td class="sorting_1">
                                                <image style="width:64px;height:64px;" src="{{asset("/images/posts/$value->image")}}"></image>
                                            </td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->bltCategory->name }}</td>
                                            <td>{{ number_format($value->view) }}</td>
                                            @if($value->status == 1)
                                                <td class="font-success">Hiển thị</td>
                                            @elseif($value->status == 2)
                                                <td class="font-danger">Ẩn</td>
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
