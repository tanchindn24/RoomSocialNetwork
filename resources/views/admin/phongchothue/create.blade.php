@extends('admin.layout.master')
@section('content2')

<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('phongchothue.index') }}">Phòng trọ đang cho thuê</a></li>
          <li class="breadcrumb-item active" aria-current="page">Thêm số khách thuê</li>
        </ol>
	</div>
<!-- /page header -->
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Nhập số khách thuê <small>(nếu phòng có 1 người thuê có thể để trống khách 2 và khách 3)</small></h2>
                @if(session('thongbao'))
                    <div class="alert alert-success alert-dismissible " role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Thông báo!</strong> {{session('thongbao')}}.
                    </div>
                @endif
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="demo-form2" method="POST" action="{{ route('phongchothue.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Phòng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="select2_group form-control" name="phongtro">
                                <option>Chọn phòng</option>
                                @foreach($listphong as $phong)
                                    <option value="{{ $phong->id }}">{{ $phong->tenphong }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Giá phòng muốn thay đổi<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" type="text" name="giathaydoi">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Khách thuê 1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control" name="khachone" required>
                                <option>Khách</option>
                                @foreach($listkhach as $khach)
                                    <option value="{{ $khach->id }}">{{ $khach->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Khách thuê 2<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control" name="khachtwo" required>
                                <option>0</option>
                                @foreach($listkhach as $khach)
                                    <option value="{{ $khach->id }}">{{ $khach->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Khách thuê 3<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control" name="khachthree" required>
                                <option>0</option>
                                @foreach($listkhach as $khach)
                                    <option value="{{ $khach->id }}">{{ $khach->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection