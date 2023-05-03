@extends('admin.layout.master')
@section('content2')
<div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Thông tin hóa đơn {{ $inhoadon->hopdong->phongtro->tenphong }}</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <section class="content invoice">
            <!-- title row -->
            <div class="row">
              <div class="  invoice-header">
                <h1>
                    <small class="pull-right">Tạo ngày: {{ date('d/m/Y', strtotime($inhoadon->ngaytao)) }}</small>
                </h1>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                Chủ trọ
                <address>
                        <strong>{{ $inhoadon->chutro->name }}</strong>
                        <br>
                        <br>{{ $inhoadon->chutro->diachi }}
                        <br>Phone: {{ $inhoadon->chutro->phone }}
                        <br>Email: {{ $inhoadon->chutro->email }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Khách thuê trọ
                <address>
                        <strong>{{ $inhoadon->hopdong->khachthuethunhat->name }}</strong>
                        <br>
                        <br>{{ $inhoadon->hopdong->khachthuethunhat->hokhau }}
                        <br>Phone: {{ $inhoadon->hopdong->khachthuethunhat->sdt }}
                        <br>Email: {{ $inhoadon->hopdong->khachthuethunhat->email }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Mã hóa đơn: {{ $inhoadon->id }}</b>
                <br>
                <br>
                <b>Ngày in:</b> {{ date('d/m/Y', strtotime($inhoadon->ngaytao)) }}
                <br>
                <b>Tài khoản:</b> {{ Auth::user()->name }}
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
                        <th>Trạng Thái</th>
                        <th>Phòng Thuê</th>
                        <th>Khách Thuê</th>
                        <th>Tiền Phòng</th>
                        <th>Tiền Điện</th>
                        <th>Tiền Nước</th>
                        <th>Tiền Dịch Vụ</th>
                        <th>Tổng Cộng</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        @if ($inhoadon->trang_thai == 1)
                            <strong style="color:#5A6268;">Chưa Xử Lý</strong>
                            @elseif ($inhoadon->trang_thai == 2)
                            <strong style="color:#169F85;">Đã Xử Lý</strong>
                        @endif
                      </td>
                      <td>{{ $inhoadon->hopdong->phongtro->tenphong }}</td>
                      <td>
                        {{ $inhoadon->hopdong->khachthuethunhat->name }} <br>
                        @if ($inhoadon->hopdong->khachthue_id_thuhai != 0)
                            {{ $inhoadon->hopdong->khachthuethuhai->name }} <br>
                        @endif
                        @if ($inhoadon->hopdong->khachthue_id_thuba != 0)
                            {{ $inhoadon->hopdong->khachthuethuba->name }}
                        @endif
                        @if ($inhoadon->hopdong->khachthue_id_thutu != 0)
                            {{ $inhoadon->hopdong->khachthuethutu->name }}
                        @endif
                      </td>
                      <td>{{ number_format($inhoadon->hopdong->phongtro->gia) }} đ</td>
                      <td>{{ number_format($inhoadon->tien_dien) }} đ</td>
                      <td>{{ number_format($inhoadon->tien_nuoc) }} đ</td>
                      <td>{{ number_format($inhoadon->tien_dich_vu_khac) }} đ</td>
                      <td>{{ number_format(($inhoadon->hopdong->phongtro->gia)+($inhoadon->tien_dien)+($inhoadon->tien_nuoc)+($inhoadon->tien_dich_vu_khac)) }} đ</td>
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
                <p class="lead">Ghi chú:</p>
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                  {{ $inhoadon->ghichu }}
                </p>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <p class="lead">In ngày {{ date('d/m/Y', strtotime($inhoadon->ngaytao)) }}</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <th style="width:50%">Các khoản cần thanh toán:</th>
                      </tr>
                      <tr>
                        <th>Tiền phòng</th>
                        <td>{{ number_format($inhoadon->hopdong->phongtro->gia) }} đ</td>
                      </tr>
                      <tr>
                        <th>Tiền điện</th>
                        <td>{{ number_format($inhoadon->tien_dien) }} đ</td>
                      </tr>
                      <tr>
                        <th>Tiền nước</th>
                        <td>{{ number_format($inhoadon->tien_nuoc) }} đ</td>
                      </tr>
                      <tr>
                        <th>Tiền dịch vụ</th>
                        <td>{{ number_format($inhoadon->tien_dich_vu_khac) }} đ</td>
                      </tr>
                      <tr>
                        <th>Tổng cộng</th>
                        <td>{{ number_format(($inhoadon->hopdong->phongtro->gia)+($inhoadon->tien_dien)+($inhoadon->tien_nuoc)+($inhoadon->tien_dich_vu_khac)) }} đ</td>
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
                <a class="btn btn-default" href="{{ route('admin.hoadon.inhoadon',$inhoadon->id) }}"><i class="fa fa-print"></i> In</a>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection