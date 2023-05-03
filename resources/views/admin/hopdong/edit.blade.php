@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('hopdong.index') }}">Danh sách hợp đồng thuê phòng trọ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tạo hợp đồng thuê phòng trọ</li>
        </ol>
	</div>
<!-- /page header -->
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Tạo hợp đồng thuê phòng trọ </h2>
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
            <form method="POST" action="{{ route('hopdong.update', [$hopdong->id]) }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                @method('PUT')
                @csrf
                <div class="item form-group">
                    <label style="font-size: 23px" class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"><span class="badge badge-light">Thông tin khách thuê:</span></label>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ông(bà) <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <div class="col-md-6 col-sm-6 ">
                            <select id="heard" class="form-control" name="idkhachthue" required>
                                <option value="{{$khachthue_id->id}}">{{ $khachthue_id->khachthueone->name }} - {{ $khachthue_id->phongtro->tenphong }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="item form-group">
                    <label style="font-size: 23px" class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"><span class="badge badge-light">Thông tin phòng:</span></label>
                </div>
                <br>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Dịch vụ <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <p style="padding: 5px;">
                            <input type="checkbox" name="dichvu[]" value="Giặt sấy" data-parsley-mincheck="2" required class="flat" /> Giặt sấy
                            <br />
                            <input type="checkbox" name="dichvu[]" value="Quản lý xe" class="flat" /> Quản lý xe
                            <br />
                            <input type="checkbox" name="dichvu[]" value="Vệ sinh" class="flat" /> Vệ sinh
                            <br />
                            <input type="checkbox" name="dichvu[]" value="Truyền hình cáp" class="flat" /> Truyền hình cáp
                            <br />
                            <input type="checkbox" name="dichvu[]" value="Internet" class="flat" /> Internet
                            <br />
                        <p>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name"> <span class="required"></span>
                    </label>
                    <div class="col-md-2 col-sm-2 ">
                        <span>Số điện ban đầu (kWh)</span>
                        <input type="number" id="last-name" name="sodienbandau" required="required" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-2 ">
                        <span>Số nước ban đầu (m3)</span>
                        <input type="number" id="last-name" name="sonuocbandau" required="required" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Hình thức thanh toán <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <select id="heard" name="phuongthucthanhtoan" class="form-control" required>
                            @foreach ($thanhtoan as $thanhtoan)
                            <option value="{{ $thanhtoan->id }}">{{ $thanhtoan->phuongthuc }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tiền cọc (VNĐ)<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 ">
                        <input type="number" id="inputNumbers" step="0.01" name="tiendatcoc" required="required" class="form-control">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Giá trị hợp đồng <span class="required">*</span>
                    </label>
                    <div class="col-md-2 col-sm-2 ">
                        <span>từ ngày</span>
                        <input type="date" id="last-name" name="tungay" required="required" class="form-control">
                    </div>
                    <div class="col-md-2 col-sm-2 ">
                        <span>đến ngày</span>
                        <input type="date" id="last-name" name="ngayhethan" required="required" class="form-control">
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button type="submit" name="themhopdong" class="btn btn-success">Tạo</button>
                    </div>
                </div>

            </form>									
        </div>
    </div>
</div>
</div>

@endsection