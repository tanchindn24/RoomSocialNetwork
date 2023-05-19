@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-primary">Danh sách bài viết</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-sm btn-success" href="{{ route('provider.posts.create') }}">Tạo bài viết</a>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table" style="text-align: center">
                                        <thead class="table-primary">
                                        <tr>
                                            <th scope="col">Tiêu đề</th>
                                            <th scope="col">Mục</th>
                                            <th scope="col">Lượt xem</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Thay đổi</th>
                                            <th scope="col">Xóa</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listPost as $value)
                                            <tr>
                                                <td>{{ substr($value->title, 0, 30) }}...</td>
                                                <td>{{ $value->Category->name }}</td>
                                                <td>{{ number_format($value->view) }}</td>
                                                <td>
                                                    @if($value->status === 1)
                                                        <form method="post"
                                                              action="{{ route('provider.post.hide', $value->id)}}">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-sm"><i
                                                                    data-feather="eye"></i></button>
                                                        </form>
                                                    @elseif($value->status === 2)
                                                        <form method="post"
                                                              action="{{ route('provider.post.show', $value->id)}}">
                                                            @csrf
                                                            @method('put')
                                                            <button type="submit" class="btn btn-sm"><i
                                                                    data-feather="eye-off"></i></button>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('provider.post.edit', $value->id) }}"><i
                                                            data-feather="edit"></i></a>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="{{ route('provider.post.delete', $value->id)}}">
                                                        @csrf
                                                        @method('delete')
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
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
