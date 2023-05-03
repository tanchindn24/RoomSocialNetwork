@extends('admin.layout.master')
@section('content2')
    <!-- Main content -->
    <div class="content-wrapper">
        <div class="breadcrumb-line">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lí Loại phòng</li>
            </ol>
        </div>
        <!-- /page header -->
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    @if(session('thongbao'))
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Thông báo!</strong> {{session('thongbao')}}.
                        </div>
                    @endif
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <button type="button" class="btn btn-warning"></button><b>Cao cấp</b>
                        <button type="button" class="btn btn-info"></button><b>Tầm trung</b>
                        <button type="button" class="btn btn-success"></button><b>Hoạt động</b>
                        <button type="button" class="btn btn-secondary"></button><b>Không hoạt động</b>
                    </div>
                    <div class="clearfix"></div>
                </div>
                {{-- Created --}}
                <div class="x_content col-md-6 col-sm-6">
                    <br/>
                    <form method="POST" action="{{ route('loaiphong.store') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Loại phòng <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="ten" id="first-name" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Danh mục <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p>
                                    Tầm trung:
                                    <input type="radio" class="flat" name="danhmuc" id="genderM" value="1" checked="" required />
                                    Cao cấp:
                                    <input type="radio" class="flat" name="danhmuc" id="genderF" value="2" />
                                </p>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">tình trạng <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <p>
                                    Hoạt động:
                                    <input type="radio" class="flat" name="tinhtrang" id="genderM" value="1" checked="" required />
                                    Không hoạt động:
                                    <input type="radio" class="flat" name="tinhtrang" id="genderF" value="2" />
                                </p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- List --}}
                <div class="table-responsive col-md-6 col-sm-6">
                    <table class="table table-hover jambo_table bulk_action">
                        <thead>
                        <tr>
                            <th>TÊN</th>
                            <th>DANH MỤC</th>
                            <th>TÌNH TRẠNG</th>
                            <th>TÙY CHỌN</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loaiphong as $loai)
                            <tr>
                                <td>{{ $loai->ten }}</td>
                                <td>
                                    @if( $loai->danhmuc == 1)
                                        <span class="btn btn-info">Tầm Trung</span>
                                    @elseif( $loai->danhmuc == 2)
                                        <span class="btn btn-warning">Cao Cấp</span>
                                    @endif
                                </td>
                                <td>
                                    @if( $loai->tinhtrang == 1)
                                        <span class="btn btn-success">Hoạt Động</span>
                                    @elseif( $loai->tinhtrang == 2)
                                        <span class="btn btn-secondary">Không Hoạt Động</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-secondary  dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Lựa chọn
                                    </button>
                                    <div class="dropdown-menu">
                                        @if($loai->tinhtrang==1)
                                            <a class="dropdown-item" href="/admin/loaiphong/huyhoatdong/{{$loai->id}}"><i class="fa fa-spinner"></i> Tắt</a>
                                        @elseif($loai->tinhtrang==2)
                                            <a class="dropdown-item" href="/admin/loaiphong/hoatdong/{{$loai->id}}"><i class="fa fa-spinner"></i> Mở</a>
                                        @endif
                                        <a class="dropdown-item" href=""><i class="fa fa-edit"></i> Thay đổi </a>
                                        <form method="POST" action="{{ route('loaiphong.destroy',$loai->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button onclick="return confirm('CẢNH BÁO!!! Bạn muốn xóa {{ $loai->ten }}? điều này sẽ xóa tất cả phòng trọ thuộc loại phòng này');"
                                                    class="dropdown-item"><i class="fa fa-trash"></i> Xóa</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection