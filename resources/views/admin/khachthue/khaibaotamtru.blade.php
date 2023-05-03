@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
    
    <!-- /page header -->
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          @if(session('thongbao'))
            <div class="alert alert-success alert-dismissible " role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <strong>Thông báo!</strong> {{session('thongbao')}}.
            </div>
          @endif
          <div class="clearfix"></div>
        </div>
        <form method="POST" action="{{ route('khachthue.postdatatamtru') }}" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
          @csrf
          <div class="col-md-12 bg-white p-3">
              <h6><i class="fa fa-address-card mr-2"></i>Nhập thông tin</h6>
              <hr/>
              <div class="form-row">
                  <div class="form-group col-md-3">
                      <label class="mb-1" for="inputLocation" style="font-weight: bold">Khai Báo Cho Khách</label>
                      <div class="detail-content">
                        <select class="form-control rounded" name="idkhachthue" required>
                            <option value="0">Vui lòng chọn khách thuê</option>
                            @foreach ($listkhach as $listkhach)
                                <option value="{{ $listkhach->id }}">{{ $listkhach->name }}</option>
                            @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="form-group col-md-3">
                      <label class="mb-1" for="inputLocation" style="font-weight: bold">Tên Chủ Hộ</label>
                      <div class="detail-content">
                          <input type="text" class="form-control rounded" name="tenchuho" value="" required>
                      </div>
                  </div>
                  <div class="form-group col-md-3">
                      <label class="mb-1" for="inputLocation" style="font-weight: bold">Số Điện Thoại Chủ Hộ</label>
                      <div class="detail-content">
                          <input type="number" class="form-control rounded" name="sdtchuho" value="" required>
                      </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label class=" mb-1" for="inputLocation" style="font-weight: bold">Thời Gian Tạm Trú</label>
                    <div class="detail-content">
                        <input type="date" class="form-control rounded" name="thoigiantamtru" value="" required>
                    </div>
                </div>
              </div>
              <div class="form-row">
                  <div class="form-group col-md-3">
                      <label class=" mb-1" for="inputLocation" style="font-weight: bold">Số Nhà (tên đường)</label>
                      <div class="detail-content">
                          <input type="text" class="form-control rounded" name="sonha" value="" required>
                      </div>
                  </div>
                  <form method="POST" action="{{url('/get-select')}}">
                    @csrf
                    <div class="form-group col-md-3">
                        <label class=" mb-1" for="inputLocation" style="font-weight: bold">Tỉnh Thành</label>
                        <div class="detail-content">
                            <select class="form-control rounded chon thanhpho" name="tinhthanh" id="thanhpho" required>
                                <option value="0">Vui lòng chọn tỉnh thành</option>
                                @foreach ($listthanhpho as $listthanhpho)
                                    <option value="{{ $listthanhpho->matp }}">{{ $listthanhpho->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class=" mb-1" for="inputLocation" style="font-weight: bold">Quận Huyện</label>
                        <div class="detail-content">
                            <select class="form-control rounded quanhuyen chon" name="quanhuyen" id="quanhuyen" required>
                                <option value="0">Vui lòng chọn quận huyện</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                    <label class=" mb-1" for="inputLocation" style="font-weight: bold">Xã Phường</label>
                        <div class="detail-content">
                            <select class="form-control rounded xaphuong" name="xaphuong" id="xaphuong" required>
                                <option value="0">Vui lòng chọn quận huyện</option>

                            </select>
                        </div>
                    </div>
                  </form>
              <hr>
              <div class="form-row">
                  <div class="form-group">
                      <div class="col-md-12">
                          <button class="btn btn-primary"><i class="fa fa-paper-plane"></i>&nbsp;Khai báo</button>
                      </div>
                  </div>
              </div>
          </div>
      </form>
      </div>
    </div>
</div>
@endsection