@extends('admin.layout.master')
@section('content2')
    <!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">Thêm phòng</li>
        </ol>
	</div>
    <!-- /page header -->
    <div class="col-md-12 col-sm-12">
      <div class="x_panel">
        <div class="x_title">
        </div>
        {{-- Created --}}
        <div class="x_content col-md-12 col-sm-12">
            <br/>
            <form method="POST" action="{{ route('phongtro.store') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              @csrf
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tên phòng <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="tenphong" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Địa chỉ <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="diachiphong" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Giá <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="giaphong" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Diện tích <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input type="text" name="dientichphong" class="form-control ">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">tiền điện (/kWh)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="middle-name" name="tiendien" class="form-control" type="number">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">tiền nước (/m3)<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <input id="middle-name" name="tiennuoc" class="form-control" type="number">
                </div>
              </div>
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">loại phòng <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="loaiphong">
                    @foreach($loaiphong as $loaiphong)
                    <option value="{{ $loaiphong->id }}">{{ $loaiphong->ten }}-
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
              <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">tình trạng <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 ">
                  <select class="form-control" name="tinhtrang">
                    @foreach($tinhtrang as $tinhtrang)
                      <option value="{{ $tinhtrang->id }}">{{ $tinhtrang->trangthai }}</option>
                    @endforeach
                  </select>
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
        </div>
@endsection