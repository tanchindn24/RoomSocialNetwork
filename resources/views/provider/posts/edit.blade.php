@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-primary">Chỉnh sửa bài viết</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('provider.index')}}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form theme-form" enctype="multipart/form-data"
                                  action="{{ route('provider.posts.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Tiêu đề</label>
                                            <input class="form-control" name="title" type="text"
                                                   value="{{$editPost->title}}" placeholder="Title *">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Địa chỉ</label>
                                            <input class="form-control" name="address" type="text"
                                                   value="{{ $editPost->address }}" placeholder="Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Diện tích</label>
                                            <input class="form-control" name="area" type="number"
                                                   value="{{ $editPost->area }}" placeholder="Area">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label>Mục</label>
                                            <select name="category" class="form-select">
                                                @foreach($listCategory as $value)
                                                    <option
                                                        {{ $value->id === $editPost->category_id ? 'selected' : ''}} value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Mô tả</label>
                                            <textarea class="form-control" name="description"
                                                      id="exampleFormControlTextarea4"
                                                      rows="3">{{ $editPost->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label>Ảnh mô tả</label>
                                            <div>
                                                <input id="format-file-edit-post" type="file" class="file"
                                                       name="images[]" multiple data-preview-file-type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="text-end">
                                            <button class="btn btn-success me-3" type="submit">Thay đổi</button>
                                            <a class="btn btn-danger"
                                               href="{{ route('provider.posts.create') }}">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
