@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('dientro.index') }}">Danh sách số điện</a></li>
          <li class="breadcrumb-item active" aria-current="page">Nhập số điện {{ $chitiet->phongchothue->phongtro->tenphong }}</li>
        </ol>
	</div>
<!-- /page header -->
<div class="x_panel">
    <div class="x_title">
        <h2>Nhập số điện {{ $chitiet->phongchothue->phongtro->tenphong }} </h2>
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
        <br/>
        <form action="{{ route('admin.dientro.nhapsodien', ['id'=>$chitiet->id]) }}" class="form-label-left input_mask">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ngày nhập<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="date" id="inputNumbers" step="0.01" name="ngaynhap" required="required" class="form-control">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Số điện trước đó<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="inputNumbers" step="0.01" name="sodientruoc" required="required" class="form-control" value="{{ $sodientruoc->sotruoc }}">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Số điện hiện tại<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="inputNumbers" step="0.01" name="sodienmoi" required="required" class="form-control">
                </div>
            </div>

            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Giá điện<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                    <input type="number" id="inputNumbers" step="0.01" name="giadien" required="required" class="form-control">
                </div>
            </div>

            <div class="ln_solid"></div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-6  offset-md-6">
                    <button type="submit" class="btn btn-success">Thêm</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection