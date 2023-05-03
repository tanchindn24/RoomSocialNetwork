<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/public/custom/css/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/public/custom/css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/public/custom/css/bootstrap/dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/public/custom/css/bootstrap/dist/css/bootstrap-theme.min.css" />
    <style type="text/css">
        #data { margin: 0 auto; width:auto; padding:20px; border:#066 thin ridge; height:auto; }
    </style>
</head>
<body style=" background-size:cover;">
<div id="data">
<center>
    <h4><center>HỢP ĐỒNG THUÊ TRỌ</center></h4>
    <p>Chủ trọ - Khách thuê</p>
    <p><strong>Chi tiết hợp đồng</strong></p>
    <i style="text-align:right; margin-left:250px;">ngày lập: {{ date('d/m/Y', strtotime($chitiet->created_at)) }}</i>
</center>
    <div id="context">
        <table class="table table-striped table-bordered">
            <tr>
                <td>Họ tên khách thuê:</td><td><b>{{ $chitiet->khachthuethunhat->name }}</b></td>
                <td>Ngày sinh:</td><td><b>{{ date('d/m/Y', strtotime($chitiet->khachthuethunhat->ngaysinh)) }}</b></td>
            </tr>
            <tr>
                <td>Địa chỉ:</td><td><b>{{ $chitiet->khachthuethunhat->hokhau }}</b></td>
            </tr>
            <tr>
                <td>Số điện thoại:</td><td><b>{{ $chitiet->khachthuethunhat->sdt }}</b></td>
                <td>Email:</td><td><b>{{ $chitiet->khachthuethunhat->email }}</b></td>
            </tr>
            <tr>
                <td>CMND:</td><td><b>{{ $chitiet->khachthuethunhat->cmnd }}</b></td>
                <td>Ngày cấp:</td><td><b>{{ date('d/m/Y', strtotime($chitiet->khachthuethunhat->ngaycapcmnd)) }}</b></td>
            </tr>
            <tr>
                <td>Nơi cấp:</td><td><b>{{ $chitiet->khachthuethunhat->noicapcmnd }}</b></td>
            </tr>
            <tr>
                <td>Thuê phòng:</td><td><b>{{ $chitiet->phongtro->tenphong }}</b></td>
                <td>Số người ở:</td>
                <td>
                    <b>
                        {{ $chitiet->khachthuethunhat->name }} <br>
                        @if ($chitiet->khachthue_id_thuhai != 0)
                            {{ $chitiet->khachthuethuhai->name }} <br>
                        @endif
                        @if ($chitiet->khachthue_id_thuba != 0)
                            {{ $chitiet->khachthuethuba->name }}
                        @endif
                        @if ($chitiet->khachthue_id_thutu != 0)
                            {{ $chitiet->khachthuethutu->name }}
                        @endif
                    </b>
                </td>
            </tr>
            <tr>
                <td>Giá điện:</td><td><b>{{ number_format($chitiet->phongtro->tiendien) }}đ/kWh</b></td>
                <td>Giá nước:</td><td><b>{{ number_format($chitiet->phongtro->tiennuoc)}}đ/m3</b></td>
            </tr>
            <tr>
                <td>Giá phòng:</td><td><b>{{ number_format($chitiet->phongtro->gia) }}đ</b></td>
                <td>Giá thuê:</td><td><b>{{ number_format($chitiet->giathaydoi) }} đ</b></td>
            </tr>
            <tr>
                <td>Tiền cọc:</td><td><b>{{ number_format($chitiet->tiencoc)}}đ</b></td>
                <td>Số tiền phải trả còn lại:</td><td><b>{{ number_format(($chitiet->giathaydoi) - ($chitiet->tiencoc)) }} đ</b></td>
            </tr>
            <tr>
                <td>Số nước ban đầu:</td><td><b>{{ $chitiet->sonuocbandau }}</b></td>
                <td>Số điện ban đầu:</td><td><b>{{ $chitiet->sodienbandau }}</b></td>
            </tr>
            <tr>
                <?php $array_dichvu = json_decode($chitiet->dichvu, true) ?>
                <td>Dịch vụ thêm:</td><td><b>@foreach($array_dichvu as $dvkemtheo){{$dvkemtheo}}, @endforeach</b></td>
            </tr>
            <tr>
                <td>Từ ngày:</td><td><b>{{ date('d/m/Y', strtotime($chitiet->tungay)) }}</b></td>
                <td>Đến ngày:</td><td><b>{{ date('d/m/Y', strtotime($chitiet->denngay)) }}</b></td>
            </tr>
            <tr>
                <td>Ảnh CMND/CCCD của khách thuê:</td><td><?php $array_img = json_decode($chitiet->khachthuethunhat->hinhanhcmnd, true) ?>
                    @foreach($array_img as $imgcmndkhach)
                    <img src="/public/uploads/khachthue/cmnd/<?php echo $imgcmndkhach; ?>" style="width: 100px;height :70px">
                    @endforeach
                </td>
                <td>Ảnh giấy tờ tùy thân:</td><td><?php $array_img = json_decode($chitiet->hinhanh_gttt, true) ?>
                    @foreach($array_img as $imggiaytotuythan)
                    <img src="/public/uploads/hopdong/giaytotuythan/<?php echo $imggiaytotuythan; ?>" style="width: 40px;height :47px">
                    @endforeach
                </td>
            </tr>
        </table>
    </div>
</div>
<center>
    <a href="{{ route('admin.hopdong.inhopdong',$chitiet->id) }}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print"></span>&nbsp;In hợp đồng</button></a>&nbsp;
    <a href="{{ route('hopdong.index') }}"><button class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Trở lại</button></a>
</center>
</body>
</html>