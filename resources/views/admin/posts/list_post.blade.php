@extends('layout.admin.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Danh sách bài viết</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i data-feather="home"></i></a>
                            </li>
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Danh sách bài viết</li>
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
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class="table-primary">
                                        <tr>
                                            <th></th>
                                            <th>Tiêu đề</th>
                                            <th>Mục bài viết</th>
                                            <th>Người đăng</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(!empty($listPost))
                                            @foreach($listPost as $value)
                                                <tr>
                                                    <td>
                                                        <form id="lock-form-{{ $value->id }}"
                                                              action="{{ route('admin.post.delete', $value->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-xs" type="submit">Xóa
                                                            </button>
                                                        </form>
                                                        @if($value->status === 1)
                                                            <a class="btn btn-warning btn-xs" type="button"
                                                               href="{{ route('admin.post.inactive', $value->id) }}"
                                                               data-original-title="btn btn-danger btn-xs" title="">Ẩn</a>
                                                        @elseif($value->status === 2)
                                                            <a class="btn btn-success btn-xs" type="button"
                                                               href="{{ route('admin.post.active', $value->id) }}"
                                                               data-original-title="btn btn-danger btn-xs"
                                                               title="">Duyệt</a>
                                                        @endif
                                                    </td>
                                                    {{--                                            <td class="sorting_1">--}}
                                                    {{--                                                <image style="width:64px;height:64px;" src="{{asset("/images/posts/$value->image")}}"></image>--}}
                                                    {{--                                            </td>--}}
                                                    <td>{{ $value->title }}</td>
                                                    <td>{{ $value->Category->name }}</td>
                                                    <td>{{ $value->User->name }}</td>
                                                    @if($value->status === 1)
                                                        <td class="font-success">Hiển thị</td>
                                                    @elseif($value->status === 2)
                                                        <td class="font-danger">Ẩn</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <div class="alert alert-secondary">Chưa có bài viết!</div>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Individual column searching (text inputs) Ends-->
                </div>
            </div>
            {!! $listPost->links() !!}
            <!-- Container-fluid Ends-->
        </div>
    </div>
@endsection
