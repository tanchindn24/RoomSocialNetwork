@extends('layouts.chutro.master')
@section('content')
    <style>
        .font-bold {
            font-weight: bold;
        }
        b::before {
            content: '📝';
            color: green;
        }
    </style>
    <section class="content-main">
        <div class="row mt-60">
            <div class="col-sm-12">
                <div class="w-75 mx-auto text-center">
                    <img src="/public/assets/back-end/imgs/theme/no-data.png" width="200" />
                    <h3 class="mt-40 mb-15">Bạn chưa có nhà trọ nào! Vui lòng thêm nhà trọ để tiếp tục</h3>
                    <p>Với thiết kết đơn giản - thân thiện - dễ sử dụng. Quản lý nhà trọ của bạn dễ hơn bao giờ hết.</p>
                    <!-- Extra large modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">
                        <i class="fa-solid fa-plus"></i> Thêm phòng trọ đầu tiên
                    </button>
                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa-solid fa-house"></i>Thêm Nhà trọ</h5>
                                    <i type="button" class="fa-solid fa-rectangle-xmark" data-dismiss="modal" aria-label="Close"></i>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{route('chutro.phongtro.add')}}" id="add-block-form">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <div class="d-flex"><b class="font-bold">Thông tin nhà trọ:</b></div>
                                                <i class="des d-flex">Các thông tin cơ bản</i>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select form-control" data-format="numeric" id="category" name="category" required>
                                                        @foreach($loaiphong as $ds_loaiphong)
                                                            <option value="{{$ds_loaiphong->id}}">{{$ds_loaiphong->ten}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="category">Loại nhà trọ</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" name="name" id="name" required placeholder="Tên nhà trọ">
                                                    <label for="name">Tên nhà trọ</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="form-check d-flex">
                                                    <input class="form-check-input" type="checkbox" name="wait_update" id="wait_update" value="1" checked>
                                                    <label class="form-check-label" for="wait_update">
                                                        <b class="font-bold d-flex">Tạo phòng tự động: (đang phát triển)</b>
                                                        <p>Tạo phòng tự động theo số phòng bên dưới giúp việc nhập dữ liệu nhanh hơn</p>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <select class="form-select form-control" data-format="numeric" id="count_floor" name="count_floor" required>
                                                        <option value="1">Tầng trệt (không có tầng)</option>
                                                        <option value="2">2 tầng (Gồm 1 trệt + 1 tầng)</option>
                                                        <option value="3">3 tầng (Gồm 1 trệt + 2 tầng)</option>
                                                        <option value="4">4 tầng (Gồm 1 trệt + 3 tầng)</option>
                                                        <option value="5">5 tầng (Gồm 1 trệt + 4 tầng)</option>
                                                        <option value="6">6 tầng (Gồm 1 trệt + 5 tầng)</option>
                                                        <option value="7">7 tầng (Gồm 1 trệt + 6 tầng)</option>
                                                        <option value="8">8 tầng (Gồm 1 trệt + 7 tầng)</option>
                                                    </select>
                                                    <label for="count_floor">Loại nhà trọ</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input data-format="numeric" type="text" class="form-control" name="room_total" id="room_total" required placeholder="Nhập số phòng">
                                                    <label for="room_total">Số phòng</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="d-flex"><b class="font-bold">Địa chỉ:</b></div>
                                                <i class="des d-flex">Giúp khách thuê của bạn có thể tìm thấy nhà trọ dễ dàng</i>
                                            </div>
                                            <div id="block_address" class="row g-2">
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-floating">
                                                        <select class="form-select form-control province" data-format="numeric" id="province_id" name="address_component[province_id]" required>
                                                            @foreach($datathanhpho['data_thanhpho'] as $data_province)
                                                            <option value="{{$data_province->matp}}">{{$data_province->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="province">Chọn Tỉnh/TP</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-floating">
                                                        <select class="form-select form-control district" data-format="numeric" id="district_id" name="address_component[district_id]" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <label for="district">Chọn Quận/Huyện</label>
                                                        <script>
                                                            $(document).ready(function () {
                                                                // Province Change
                                                                $('#province_id').change(function () {
                                                                    // Province id
                                                                    var matp = $(this).val();
                                                                    // Empty the dropdown
                                                                    $('#district_id').find('option').not(':first').remove();
                                                                    // AJAX request
                                                                    $.ajax({
                                                                        url: 'getQuanhuyen/'+matp,
                                                                        type: 'get',
                                                                        dataType: 'json',
                                                                        success: function (response) {
                                                                            var length = 0;
                                                                            if (response['data_quanhuyen'] != null) {
                                                                                length = response['data_quanhuyen'].length;
                                                                            }
                                                                            if (length > 0) {
                                                                                // Read data and create <option>
                                                                                for (var i=0;i<length;i++) {
                                                                                    var maqh = response['data_quanhuyen'][i].maqh;
                                                                                    var name = response['data_quanhuyen'][i].name;
                                                                                    var option = "<option value='"+maqh+"'>" + name + "</option>";

                                                                                    $("#district_id").append(option);
                                                                                }
                                                                            }
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <div class="form-floating">
                                                        <select class="form-select form-control ward" data-format="numeric" id="ward_id" name="address_component[ward_id]" required>
                                                            <option value=""></option>
                                                        </select>
                                                        <label for="ward">Chọn Phường/Xã</label>
                                                        <script>
                                                            $(document).ready(function () {
                                                                // District Change
                                                                $('#district_id').change(function () {
                                                                    // District id
                                                                    var maqh = $(this).val();
                                                                    // Empty the dropdown
                                                                    $('#ward_id').find('option').not(':first').remove();
                                                                    // AJAX request
                                                                    $.ajax({
                                                                        url: 'getXaphuong/'+maqh,
                                                                        type: 'get',
                                                                        dataType: 'json',
                                                                        success: function (response) {
                                                                            var length = 0;
                                                                            if (response['data_xaphuong'] != null) {
                                                                                length = response['data_xaphuong'].length;
                                                                            }
                                                                            if (length > 0) {
                                                                                // Read data and create <option>
                                                                                for (var i=0;i<length;i++) {
                                                                                    var maxp = response['data_xaphuong'][i].maxp;
                                                                                    var name = response['data_xaphuong'][i].name;
                                                                                    var option = "<option value='"+maxp+"'>" + name + "</option>";

                                                                                    $("#ward_id").append(option);
                                                                                }
                                                                            }
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control detail_address" name="address_component[detail_address]" placeholder="Ví dụ: 470 - Đường Trần Đại Nghĩa" required>
                                                        <label for="detail_address">Địa chỉ</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="d-flex"><b class="font-bold">Thông tin cơ bản:</b></div>
                                                <i class="des d-flex">Thông tin diện tích, giá thuê, số lượng thành viên</i>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input data-format="numeric" type="text" class="form-control" name="area" id="area" value="20" placeholder="Nhập diện tích" required>
                                                    <label for="area">Diện tích (m2)</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input data-format="numeric" type="text" class="form-control" name="room_amount" id="room_amount" placeholder="Giá thuê" required>
                                                    <label for="room_amount">Giá thuê trung bình (đ)</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating">
                                                    <select data-format="numeric" id="max_member" name="max_member" class="form-control form-select">
                                                        <option value="1">1 Người ở</option>
                                                        <option value="2">2 Người ở</option>
                                                        <option value="3">3 Người ở</option>
                                                        <option value="4">4 Người ở</option>
                                                        <option value="5">5-6 Người ở</option>
                                                        <option value="6">7-10 Người ở</option>
                                                        <option value="0">Không giới hạn</option>
                                                    </select>
                                                    <label for="max_member">Tối đa người ở / phòng</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="d-flex"><b class="font-bold">Cài đặt dịch vụ:</b></div>
                                                <i class="des d-flex">Thiết lập các dịch vụ khi khách thuê sử dụng khi thuê</i>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="form-floating">
                                                    <select data-format="numeric" id="setting[price_item_ele]" name="setting[price_item_ele]" class="form-select form-control">
                                                        <option value="0">Miễn phí / Không sử dụng</option>
                                                        <option value="1">Tính theo người</option>
                                                        <option value="2">Tính theo tháng</option>
                                                        <option value="3" selected>Tính đồng hồ/chữ điện (phổ biến)</option>
                                                    </select>
                                                    <label for="setting[price_item_ele]">Dịch vụ điện</label>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="form-floating">
                                                    <select data-format="numeric" id="setting[price_item_water]" name="setting[price_item_water]" class="form-select form-control">
                                                        <option value="0">Miễn phí / Không sử dụng</option>
                                                        <option value="1">Tính theo người</option>
                                                        <option value="2">Tính theo tháng</option>
                                                        <option value="3" selected>Tính đồng hồ (phổ biến)</option>
                                                    </select>
                                                    <label for="setting[price_item_water]">Dịch vụ nước</label>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="form-floating">
                                                    <select data-format="numeric" id="ssetting[price_item_trash]" name="setting[price_item_trash]" class="form-select form-control">
                                                        <option value="0">Miễn phí / Không sử dụng</option>
                                                        <option value="1">Tính theo người</option>
                                                        <option value="2">Tính theo tháng</option>
                                                    </select>
                                                    <label for="setting[price_item_trash]">Dịch vụ rác</label>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-2">
                                                <div class="form-floating">
                                                    <select data-format="numeric" id="setting[price_item_wifi]" name="setting[price_item_wifi]" class="form-select form-control">
                                                        <option value="0">Miễn phí / Không sử dụng</option>
                                                        <option value="1">Tính theo người</option>
                                                        <option value="2">Tính theo tháng</option>
                                                    </select>
                                                    <label for="setting[price_item_wifi]">Dịch vụ internet</label>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="d-flex"><b class="font-bold">Cài đặt cho phiếu thu (hóa đơn):</b></div>
                                                <i class="des d-flex">Thiết lập cho hóa đơn khi bạn lập hóa đơn tiền thuê cho khách thuê</i>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input data-format="numeric" type="text" class="form-control" id="circle_order" name="circle_order" placeholder="Ngày lập hóa đơn" min="1" max="31" required>
                                                    <label for="circle_order">Ngày lập hóa đơn và trong khoảng 1 đến 31</label>
                                                </div>
                                                <div style="border-radius: 10px;text-align: left;padding-left: 10px" class="alert-success mt-2 mb-2 py-3">
                                                    <div class="des flex-grow-1">
                                                        <strong style="font-weight: bold">Chi tiết:</strong><br>
                                                        Khi đến ngày lập hóa đơn hệ thống sẽ nhắc nhở qua thông báo
                                                    </div>
                                                </div>
                                                <p style="text-align: left;">- Là ngày lập hóa đơn tiền điện, nước... <br>
                                                    - Nhập một ngày trong tháng. Nếu không nhập mặc định là cuối tháng.</p>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-floating">
                                                    <input data-format="numeric" type="text" class="form-control" id="deadline_bill" name="deadline_bill" placeholder="Ngày lập hóa đơn" min="1" max="20" required>
                                                    <label for="deadline_bill">Hạn đóng tiền (1-20)</label>
                                                </div>
                                                <div style="border-radius: 10px;text-align: left;padding-left: 10px" class="alert-success mt-2 mb-2 py-3">
                                                    <div class="des header-info-right">
                                                        <strong style="font-weight: bold">Chi tiết:</strong> <br>
                                                        Khi khách thuê không đóng tiền đúng hẹn hệ thống sẽ nhắc nhở bạn
                                                    </div>
                                                </div>
                                                <p style="text-align: left;"> <strong>Ví dụ:</strong> Bạn lập phiếu ngày 01 và hạn đóng tiền thuê trọ ở đây là 5 ngày thì ngày 05 sẽ là ngày hết hạn</p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    <button type="button" id="submit-block" class="btn btn-primary">Thêm nhà trọ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit-block').on('click', function () {
            console.log('ok hehe');
            let formData = $('#add-block-form').serialize();
            $.ajax({
                url: '{{route('chutro.phongtro.add')}}',
                type: 'post',
                data: formData,
                success: window.location.href = '/chutro/phongtro'
            });
        });
        {{--$(document).ready(function () {--}}
        {{--    $('#add-block-form').submit(function submitForm(e) {--}}
        {{--        console.log('ok hehe');--}}
        {{--        e.preventDefault();--}}
        {{--        let formdata = $(this).serialize();--}}
        {{--        $.ajax({--}}
        {{--            url: '{{route('post.phongtro')}}',--}}
        {{--            type: 'post',--}}
        {{--            data: formdata,--}}
        {{--        })--}}
        {{--    })--}}
        {{--});--}}
    </script>
    <script>
        $(document).ready(function () {
            $(document).find('input[data-format="numeric"]').map((key, element) => {
                element.addEventListener('keyup', e => {
                    let value = $(element).val();
                    let number = jshelper.convertStringToNumber(value);
                    let newVal = format.currencyInput(number);
                    $(element).val(value ==='' ? '': isNaN(number) ? '': newVal);
                });
            });

            $(document).find('input[data-format="stringNumber"]').map((key, element) => {
                element.addEventListener('keyup', e => {
                    $(element).val(format.phone($(element).val()));
                });
            });
        });
    </script>
@endsection
