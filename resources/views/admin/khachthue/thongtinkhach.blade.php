@extends('admin.layout.master')
@section('content2')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Thông tin khách <i class="fa fa-check-circle"></i></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <section class="content invoice">
                        <!-- title row -->
                        <div class="row">
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-md-6 invoice-col">
                                <address>
                                    <strong>Họ & tên: {{ $khach->name }}</strong>
                                    <br>Ngày sinh: {{ date('d/m/Y', strtotime($khach->ngaysinh)) }}
                                    <br>Địa chỉ: {{ $khach->hokhau }}
                                    <br>Số điện thoại: {{ $khach->sdt }}
                                    <br>Email: chưa cập nhật {{ $khach->email }}
                                    <br>CMND: {{ $khach->cmnd }}
                                    <br>Ngày cấp: {{ date('d/m/Y', strtotime($khach->ngaycapcmnd)) }}
                                    <br>Nơi cấp: {{ $khach->noicapcmnd }}
                                </address>
                            </div>
                            <div class="col-md-6 invoice-col">
                                <address>
                                    <strong> Chứng minh thư</strong>
                                    <br> <?php $array_img = json_decode($khach->hinhanhcmnd, true) ?>
                                    @foreach($array_img as $imgcmnd)
                                        <img src="/public/uploads/khachthue/cmnd/<?php echo $imgcmnd; ?>" style="width: 30%">
                                    @endforeach
                                </address>
                            </div>
                            <div class="col-md-6 invoice-col">
                                <address>
                                    <strong> Ảnh thẻ 3*4</strong>
                                    <br> <?php $array_img = json_decode($khach->hinhanhkhach, true) ?>
                                    @foreach($array_img as $img34)
                                        <img src="/public/uploads/khachthue/anhthe34/<?php echo $img34; ?>" style="width: 10%">
                                    @endforeach
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="  table">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Phòng đã thuê</th>
                                        <th>Phòng đang thuê</th>
                                        <th>Giá phòng</th>
                                        <th style="width: 59%">Ghi chú</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>chưa có thông tin</td>
                                        <td>chưa có thông tin</td>
                                        <td>chưa có thông tin</td>
                                        <td>chưa có thông tin</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-6">
                                <p class="lead">Các hóa đơn:</p>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Loại hóa đơn</th>
                                        <th>Ngày lập</th>
                                        <th>Tình trạng</th>
                                        <th>Ghi chú</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>chưa có thông tin</td>
                                        <td>chưa có thông tin</td>
                                        <td>chưa có thông tin</td>
                                        <td>chưa có thông tin</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <p class="lead">Số tiền đến hạn</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th style="width:50%">Chưa có thông tin:</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>chưa có thông tin:</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>chưa có thông tin:</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th>chưa có thông tin:</th>
                                            <td>0</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class=" ">
                                <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> In</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection