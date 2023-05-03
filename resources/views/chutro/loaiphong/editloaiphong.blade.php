@extends('layouts.chutro.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Danh sách loại phòng</h2>
                <p>Thêm, thay đổi, xóa loại phòng tại đây</p>
            </div>
            <div>
                <input type="text" placeholder="Tìm kiếm loại phòng" class="form-control bg-white" />
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                    <div class="col-md-3">
                        <form action="{{route('loaiphong.edit.post',$find_id->id)}}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Tên</label>
                                <input type="text" class="form-control" name="ten" value="{{$find_id->ten}}" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Mô tả</label>
                                <select class="form-select" name="mota">
                                    @if($find_id->mota==1)
                                        <option value="1">Tầm trung</option>
                                        <option value="2">Cao cấp</option>
                                    @else
                                        <option value="1">Tầm trung</option>
                                        <option value="2">Cao cấp</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Tình trạng</label>
                                <select class="form-select" name="tinhtrang">
                                    @if($find_id->tinhtrang==1)
                                        <option value="1">Mở</option>
                                        <option value="2">Khóa</option>
                                    @else
                                        <option value="1">Mở</option>
                                        <option value="2">Khóa</option>
                                    @endif
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
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Tình trạng</th>
                                    <th>Số phòng</th>
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
                                        <td><b>{{$list->ten}}</b></td>
                                        <td>
                                            @if($list->mota==1)
                                                tầm trung
                                            @elseif($list->mota==2)
                                                cao cấp
                                            @endif
                                        </td>
                                        <td>
                                            @if($list->tinhtrang==1)
                                                <span class="badge rounded-pill alert-success">mở</span>
                                            @elseif($list->tinhtrang==2)
                                                <span class="badge rounded-pill alert-danger">khóa</span>
                                            @endif
                                        </td>
                                        <td>1</td>
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
