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
            <form method="POST" action="{{ route('admin.hopdong.postdatahopdong',$phongtro->id) }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="col-md-12 bg-white p-3">
                    <h6><i class="fa fa-address-card mr-2"></i>Nhập thông tin</h6>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Thông Tin Khách Thuê (1. Đại diện)</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="idkhachthue1" required>
                                    <option value="0">Vui lòng chọn khách thuê</option>
                                    @foreach ($listkhach as $listkhach)
                                        <option value="{{ $listkhach->id }}">{{ $listkhach->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Thông Tin Khách Thuê (2)</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="idkhachthue2" required>
                                    <option value="0">Vui lòng chọn khách thuê 2 (nếu có)</option>
                                    @foreach ($listkhach2 as $listkhach)
                                        <option value="{{ $listkhach->id }}">{{ $listkhach->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Thông Tin Khách Thuê (3)</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="idkhachthue3" required>
                                    <option value="0">Vui lòng chọn khách thuê 3 (nếu có)</option>
                                    @foreach ($listkhach3 as $listkhach)
                                        <option value="{{ $listkhach->id }}">{{ $listkhach->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Thông Tin Khách Thuê (4)</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="idkhachthue4" required>
                                    <option value="0">Vui lòng chọn khách thuê 4 (nếu có)</option>
                                    @foreach ($listkhach4 as $listkhach)
                                        <option value="{{ $listkhach->id }}">{{ $listkhach->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Thông Tin Phòng Thuê</label>
                            <div class="detail-content">
                                <input type="text" class="form-control rounded" value="{{ $phongtro->tenphong }} - {{ number_format($phongtro->gia) }}đ" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Giá Phòng Muốn Thay Đổi</label>
                            <div class="detail-content">
                                <input type="number" class="form-control rounded" name="giathaydoi" value="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Số Điện Ban Đầu</label>
                            <div class="detail-content">
                                <input type="number" class="form-control rounded" name="sodienbandau" value="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Số Nước Ban Đầu</label>
                            <div class="detail-content">
                                <input type="number" class="form-control rounded" name="sonuocbandau" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class=" mb-1" for="inputLocation" style="font-weight: bold">Thời Gian Bắt Đầu Hợp Đồng</label>
                            <div class="detail-content">
                                <input type="date" class="form-control rounded" name="thoigianbatdau" value="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class=" mb-1" for="inputLocation" style="font-weight: bold">Thời Gian Kết Thúc Hợp Đồng</label>
                            <div class="detail-content">
                                <input type="date" class="form-control rounded" name="thoigianketthuc" value="" required>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class=" mb-1" for="inputLocation" style="font-weight: bold">Hình Thức Thanh Toán</label>
                            <div class="detail-content">
                                <select type="text" class="form-control rounded" name="phuongthucthanhtoan" required>
                                    <option value="0">Vui lòng chọn hình thức thanh toán</option>
                                    @foreach ($thanhtoan as $thanhtoan)
                                    <option value="{{ $thanhtoan->id }}">{{ $thanhtoan->phuongthuc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class=" mb-1" for="inputLocation" style="font-weight: bold">Số Tiền Đặt Cọc</label>
                            <div class="detail-content">
                                <input type="number" class="form-control rounded" name="tiendatcoc" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="mb-1" for="inputLocation" style="font-weight: bold">Các Dịch Vụ Đi Kèm</label>
                            <div class="detail-content">
                                <div class="row">
                                    <input type="checkbox" name="dichvu[]" value="Không" class="flat" checked="checked" />(Tích vào nếu không sử dụng dịch vụ nào) &nbsp;
                                    <input type="checkbox" name="dichvu[]" value="Giặt sấy" class="flat" /> Giặt sấy &nbsp;
                                    <input type="checkbox" name="dichvu[]" value="Quản lý xe" class="flat" /> Quản lý xe &nbsp;
                                    <input type="checkbox" name="dichvu[]" value="Vệ sinh" class="flat" /> Vệ sinh &nbsp;
                                    <input type="checkbox" name="dichvu[]" value="Internet" class="flat" /> Internet
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class=" mb-1" for="inputLocation" style="font-weight: bold">Ảnh Giấy Tờ Tùy Thân</label>
                            <div class="detail-content">
                                <div class="form-group">
                                    <label for="comment">Thêm hình ảnh:</label>
                                    <div class="file-loading">
                                    <input id="format-file" type="file" class="file" name="giaytotuythan[]" multiple data-preview-file-type="any" data-upload-url="#">
                                    </div>
                                </div>
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