@extends('admin.layout.master')
@section('content2')
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('hoadon.index') }}">Danh sách hợp các hóa đơn</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tạo hóa đơn</li>
        </ol>
	</div>
<!-- /page header -->
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> Tạo hóa đơn {{ $hopdong->phongtro->tenphong }} | khách đang thuê: {{ $hopdong->khachthuethunhat->name }}</h2>
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
            <form method="POST" action="{{ route('hoadon.postdatahoadon', [$hopdong->id]) }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="col-md-12 bg-white p-3">
                    <h6><i class="fa fa-address-card mr-2"></i>Nhập thông tin</h6>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Tiền điện tháng</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="tiendien" required>
                                    <option value="0">Chọn tháng tiền điện</option>
                                    @foreach ($tiendien as $tiendien)
                                        <option value="{{ ($tiendien->sodienmoi)*($tiendien->giadien) }}">Tháng {{ date('m/Y', strtotime($tiendien->ngaynhap)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Tiền nước tháng</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="tiennuoc" required>
                                    <option value="0">Chọn tháng tiền nước</option>
                                    @foreach ($tiennuoc as $tiennuoc)
                                        <option value="{{ ($tiennuoc->sonuocmoi)*($tiennuoc->gianuoc) }}">Tháng {{ date('m/Y', strtotime($tiennuoc->ngaynhap)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class=" mb-1" for="inputLocation" style="font-weight: bold">Ngày tạo</label>
                            <div class="detail-content">
                                <input type="date" class="form-control rounded" name="ngaytao" value="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Ghi chú</label>
                            <div class="detail-content">
                                <textarea class="form-control rounded" name="ghichu" value=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Tiền dịch vụ khác</label>
                            <div class="detail-content">
                                <input type="number" class="form-control rounded" name="tiendichvu" value="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Các dịch vụ đã đăng ký</label>
                            <div class="detail-content">
                                <?php $array_dichvu = json_decode($hopdong->dichvu, true) ?>
                                <input type="text" class="form-control rounded" disabled value="@foreach($array_dichvu as $dvkemtheo){{$dvkemtheo}}, @endforeach" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Tạo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>						
        </div>
    </div>
</div>
</div>
@endsection