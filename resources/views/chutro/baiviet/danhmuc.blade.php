@extends('layouts.chutro.master')
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
                    <div class="col-md-12">
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
                                    <th>Số bài viết</th>
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
                                        <td>{{$list->baiviet->count()}}</td>
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
