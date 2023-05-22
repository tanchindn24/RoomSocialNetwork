@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-success">Thêm phòng</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Thêm phòng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Thêm phòng</h5>
                        </div>
                        <form class="form theme-form" action="{{ route('provider.room.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlInput1">Phòng số</label>
                                        <input
                                            name="number_room"
                                            class="form-control" id="exampleFormControlInput1" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlSelect9">Nhà</label>
                                        <select name="house" class="form-select digits"
                                                id="exampleFormControlSelect9">
                                            @foreach($houses as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlInput1">Thứ tự</label>
                                        <input
                                            name="numerical_order"
                                            class="form-control" id="exampleFormControlInput1" type="number">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustomUsername">Đơn giá</label>
                                        <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">VNĐ</span>
                                            <input data-format="numeric" class="form-control" type="text" name="price"
                                                   aria-describedby="inputGroupPrepend" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustomUsername">Chiều dài</label>
                                        <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">M2</span>
                                            <input data-format="numeric" class="form-control" type="text"
                                                   name="height" aria-describedby="inputGroupPrepend"
                                                   required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustomUsername">Chiều rộng</label>
                                        <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">M2</span>
                                            <input data-format="numeric" class="form-control" type="text"
                                                   name="width" aria-describedby="inputGroupPrepend"
                                                   required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <label class="form-label" for="validationCustomUsername">Số người tối đa</label>
                                        <div class="input-group"><span class="input-group-text" id="inputGroupPrepend">NGƯỜI</span>
                                            <input class="form-control" type="number"
                                                   name="number_people" aria-describedby="inputGroupPrepend"
                                                   required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Cho thuê</label>
                                        <label class="d-block" for="chk-ani">
                                            <input class="checkbox_animated" id="chk-ani" name="gender[]" value="1"
                                                   type="checkbox" checked="">Nam
                                        </label>
                                        <label class="d-block" for="chk-ani1">
                                            <input class="checkbox_animated" id="chk-ani1" name="gender[]" value="2"
                                                   type="checkbox">Nữ
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <div>
                                            <label class="form-label" for="exampleFormControlTextarea4">Ghi chú</label>
                                            <textarea name="note" class="form-control" id="exampleFormControlTextarea4"
                                                      rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-success" type="submit">Thêm</button>
                                <a class="btn btn-danger" href="#">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const numberInputs = document.querySelectorAll('input[data-format="numeric"]');

        numberInputs.forEach(input => {
            input.addEventListener('input', function () {
                const value = this.value;
                const formattedValue = formatNumber(value);
                this.value = formattedValue;
            });
        });

        function formatNumber(number) {
            const numericValue = number.replace(/[^\d]/g, '');
            const parsedValue = numericValue ? parseInt(numericValue, 10) : 0;

            return parsedValue.toLocaleString();
        }
    </script>
@endsection
