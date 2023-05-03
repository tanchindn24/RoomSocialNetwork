@extends('admin.layout.master')
@section('content2')
<!-- Main content -->
<div class="content-wrapper">
  <div class="breadcrumb-line">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Phòng trọ đang thuê</li>
    </ol>
  </div>
  <!-- /page header -->
  <div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Quản lý phòng đang thuê</h2>
        @if(session('thongbao'))
          <div class="alert alert-success alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Thông báo!</strong> {{session('thongbao')}}.
          </div>
        @endif
        <div class="clearfix"></div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover jambo_table bulk_action">
          <thead>
          <tr>
            <th>PHÒNG</th>
            <th>TÊN KHÁCH THUÊ</th>
            <th>CHI TIẾT</th>
            <th>HỢP ĐỒNG</th>
            <th>ĐIỆN / NƯỚC</th>
            <th>HÓA ĐƠN</th>
            <th>TÙY CHỌN</th>
          </tr>
          </thead>
          <tbody>
          @foreach($listkhachphong as $phongthue)
            <tr>
              <td>{{ $phongthue->phongtro->tenphong }}</td>
              <td>
               + {{ $phongthue->khachthueone->name }} <br>
                @if ($phongthue->khachthue2_id != 0)
                + {{ $phongthue->khachthuetwo->name }} <br>
                @endif
                @if ($phongthue->khachthue3_id != 0)
                + {{ $phongthue->khachthuethree->name }}
                @endif
              </td>
              <td>
                <span><a class="btn btn-outline-info btn-sm" href="{{ route('phongchothue.show',$phongthue->id) }}">Chi tiết</a></span>
              </td>
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#hopdongModalCenter">
                  Hợp đồng
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hopdongModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Hợp đồng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5>Tạo hợp đồng</h5>
                          <p>
                            <form method="POST" action="{{ route('hopdong.store') }}">
                              @csrf
                              <select id="heard" class="form-control" name="idkhachthue" required>
                                @foreach($listkhachphong as $phongkhach)
                                <option value="{{$phongkhach->id}}">{{ $phongkhach->khachthueone->name }} -- {{ $phongkhach->phongtro->tenphong }}</option>
                                @endforeach
                              </select>
                          </p>
                          <hr>
                          <h5>Danh sách hợp đồng</h5>
                          <p><a href="{{ route('hopdong.index') }}" class="tooltip-test" title="Mở Danh sách hợp đồng">Mở</a></p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Tạo</button>
                      </div>
                            </form>    
                    </div>
                  </div>
                </div>
                {{-- <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('hopdong.index')}}"><i class="fa fa-align-left"></i> Mở hợp đồng </a>
                  <button class="dropdown-item" data-toggle="modal" data-target="#taohopdong"><i class="fa fa-tag"></i> Tạo hợp đồng </button>
                  <form method="POST" action="{{route('phongchothue.destroy',$phongthue->id)}}">
                    @method('DELETE')
                    @csrf
                    <button  onclick="return confirm('Bạn muốn xóa {{ $phongthue->phongtro->tenphong }} với khách {{ $phongthue->khachthueone->name }}')"
                             class="dropdown-item"><i class="fa fa-trash"></i> Xóa</button>
                  </form>
                </div> --}}
              </td>
              <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#diennuocModalCenter">
                  Điện / Nước
                </button>
                <!-- Modal -->
                <div class="modal fade" id="diennuocModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Quản lí điện nước</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <h5>Số điện</h5>
                          <a class="dropdown-item" href="{{route('dientro.index')}}"><i class="fa fa-lightbulb-o"></i> Danh sách số điện </a>
                          <hr>
                        <h5>Số nước</h5>
                          <a class="dropdown-item" href="{{route('nuoctro.index')}}"><i class="fa fa-tint"></i> Danh sách số nước </a>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('dientro.index')}}"><i class="fa fa-lightbulb-o"></i> Nhập số điện </a>
                  <a class="dropdown-item" href="{{route('nuoctro.index')}}"><i class="fa fa-tint"></i> Nhập số nước </a>
                  <form method="POST" action="{{route('phongchothue.destroy',$phongthue->id)}}">
                    @method('DELETE')
                    @csrf
                    <button  onclick="return confirm('Bạn muốn xóa {{ $phongthue->phongtro->tenphong }} với khách {{ $phongthue->khachthueone->name }}')"
                             class="dropdown-item"><i class="fa fa-trash-o"></i> Xóa</button>
                  </form>
                </div> --}}
              </td>
              <td>
                <button type="button" class="btn btn-success  dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                  Hóa đơn
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href=""><i class="fa fa-edit"></i> Thay đổi </a>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-secondary  dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                  Lựa chọn
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href=""><i class="fa fa-edit"></i> Thay đổi </a>
                  <form method="POST" action="{{route('phongchothue.destroy',$phongthue->id)}}">
                    @method('DELETE')
                    @csrf
                    <button  onclick="return confirm('Bạn muốn xóa {{ $phongthue->phongtro->tenphong }} với khách {{ $phongthue->khachthueone->name }}')"
                    class="dropdown-item"><i class="fa fa-trash"></i> Xóa</button>
                  </form>
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
@endsection