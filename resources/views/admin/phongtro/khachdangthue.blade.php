@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('phongtro.index') }}">phòng trọ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Khách thuê trọ</li>
        </ol>
	</div>
<!-- /page header -->
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Danh sách khách đang thuê</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
          <div class="card-box table-responsive">
          <div class="card-box table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap">                
              <thead>
                <tr class="headings">
                  <th class="column-title">Tên phòng </th>
                  <th class="column-title">Tên khách thuê </th>
                  <th class="column-title">Tiền điện </th>
                  <th class="column-title">Tiền nước </th>                 
                  <th class="column-title">Hóa đơn </th>
                  <th class="column-title">Hợp đồng </th>
                  <th class="column-title">Tùy chọn </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($khachdangthue as $khach )
                  <tr>        
                    <td>{{ $khach->phongtro->tenphong }}</td>
                    <td>{{ $khach }}</td>
                    <td>{{ number_format($khach->phongtro->tiendien) }} /kwh</td>
                    <td>{{ number_format($khach->phongtro->tiennuoc) }} /m3</td>
                    <td>
                      @if ($khach->hoadon == 1)
                      <a href=""><span class="badge badge-success">đã thanh toán</span></a>
                      @elseif ($khach->hoadon == 2)    
                      <span class="badge badge-warning">chưa thanh toán</span>
                      @endif                    
                    </td>
                    <td>
                      @if ($khach->tinhtrang == 1)
                        <a href=""><span class="badge badge-primary">còn hợp đồng</span></a> 
                         @elseif($khach->tinhtrang==2)
                        <a href=""><span class="badge badge-secondary">hết hợp đồng</span></a>
                      @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Thay đổi
                        </button>
                        <div class="dropdown-menu">
                          @if ($khach->tinhtrang == 1)
                          <a class="dropdown-item" href="khachthuetro/hethopdong/{{ $khach->id }}"><i class="fa fa-chain-broken"></i> hết hợp đồng</a>
                          <a class="dropdown-item" href="khachthuetro/dathanhtoan/{{ $khach->id }}"><i class="fa fa-check-square"></i> đã thanh toán</a>
                          <a class="dropdown-item" href="khachthuetro/chuathanhtoan/{{ $khach->id }}"><i class="fa fa-square"></i> chưa thanh toán</a>
                          @elseif($khach->tinhtrang==2)
                          <a class="dropdown-item" href="khachthuetro/conhopdong/{{ $khach->id }}"><i class="fa fa-chain"></i> còn hợp đồng</a>
                          <a class="dropdown-item" href="khachthuetro/dathanhtoan/{{ $khach->id }}"><i class="fa fa-check-square"></i> đã thanh toán</a>
                          <a class="dropdown-item" href="khachthuetro/chuathanhtoan/{{ $khach->id }}"><i class="fa fa-square"></i> chưa thanh toán</a>
                          @endif
                        </button>
                        </div>   
                    </td>     
                  </tr>
                @endforeach
              </tbody>          
            </table>
          </div>          
        </div>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>

@endsection