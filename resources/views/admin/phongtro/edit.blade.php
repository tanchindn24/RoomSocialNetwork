@extends('admin.layout.master')
@section('content2')
<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('phongtro.index') }}">Quản lí Phòng trọ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Thay đổi phòng</li>
        </ol>
	</div>
<!-- /page header -->
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thay đổi </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br/>
                <form method="POST" action="{{ route('phongtro.update',[$phongtro->id]) }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    @method('PUT')
                    @csrf
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên phòng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="tenphong" value="{{ $phongtro->tenphong }}" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Địa chỉ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="diachiphong" value="{{ $phongtro->diachi }}" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Giá <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="giaphong" value="{{ $phongtro->gia }}" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Diện tích <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" name="dientichphong" value="{{ $phongtro->dientich }}" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">tiền điện (/kWh)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" name="tiendien" value="{{ $phongtro->tiendien }}" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">tiền nước (/m3)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="middle-name" name="tiennuoc" value="{{ $phongtro->tiennuoc }}" class="form-control" type="number">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">loại phòng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="loaiphong">
                                @foreach($loaiphong as $loaiphong)
                                    <option {{ $loaiphong->id==$phongtro->loaiphong_id ? 'selected' : '' }}
                                            value="{{ $loaiphong->id }}">{{ $loaiphong->ten }} -
                                        @if($loaiphong->danhmuc==1)
                                            <b>Tầm Trung</b>
                                        @elseif($loaiphong->danhmuc==2)
                                            <b>Cao Cấp</b>
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Thay đổi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection