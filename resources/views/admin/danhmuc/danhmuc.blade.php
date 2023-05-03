@extends('layouts.admin.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Danh mục</h2>
                <p>Quản lý danh mục bài viết tại đây</p>
            </div>
            <div>
                <input type="text" placeholder="Tìm kiếm danh mục" class="form-control bg-white" />
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                    <div class="col-md-3">
                        <form action="{{route('admin.danhmuc.add')}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Loại</label>
                                <input type="text" placeholder="Type here" class="form-control" name="loai" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Tình trạng</label>
                                <select class="form-select" name="tinhtrang">
                                    <option value="1">Mở</option>
                                    <option value="2">Khóa</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </th>
                                    <th>STT</th>
                                    <th>Loại</th>
                                    <th>Tình trạng</th>
                                    <th>Số phòng</th>
                                    <th class="text-end">Tùy chọn</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1 ?>
                                @foreach($list as $list)
                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </td>
                                        <td>{{$count++}}</td>
                                        <td><b>{{$list->loai}}</b></td>
                                        <td>
                                            @if($list->tinhtrang==1)
                                                <span class="badge rounded-pill alert-success">mở</span>
                                            @elseif($list->tinhtrang==2)
                                                <span class="badge rounded-pill alert-danger">khóa</span>
                                            @endif
                                        </td>
                                        <td>1</td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">
                                                    @if($list->tinhtrang==1)
                                                    <a class="dropdown-item" href="{{route('khoadanhmuc',$list->id)}}">khóa</a>
                                                    @elseif($list->tinhtrang==2)
                                                    <a class="dropdown-item" href="{{route('modanhmuc',$list->id)}}">mở</a>
                                                    @endif
                                                    <a class="dropdown-item" href="">Thay đổi</a>
                                                    <a class="dropdown-item text-danger" onclick="return confirm('bạn có muốn xóa danh mục <{{$list->loai}}> không?');" href="{{route('danhmuc.delete',$list->id)}}">Xóa</a>
                                                </div>
                                            </div>
                                            <!-- dropdown //end -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- .col// -->
                </div>
                <!-- .row // -->
            </div>
            <!-- card body .// -->
        </div>
        <!-- card .// -->
    </section>
@endsection
