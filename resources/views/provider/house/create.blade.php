@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-success">Thêm nhà</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Thêm nhà</li>
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
                            <h5>Thêm nhà</h5>
                        </div>
                        <form class="form theme-form" action="{{ route('provider.house.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlInput1">Nhà</label>
                                        <input
                                            name="name"
                                            class="form-control" id="exampleFormControlInput1" type="text">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlSelect9">Tỉnh/ Thành phố</label>
                                        <select name="provinces" class="form-select digits"
                                                id="selectProvinces">
                                            <option value="00">Chọn thành phố</option>
                                            @foreach($provinces as $value)
                                                <option value="{{ $value->code }}">{{ $value->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlSelect9">Quận/ huyện</label>
                                        <select name="districts" class="form-select digits"
                                                id="selectDistricts">
                                            <option value="000">Chọn quận huyện</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="exampleFormControlSelect9">Phường/ xã</label>
                                        <select name="wards" class="form-select digits"
                                                id="selectWards">
                                            <option value="00000">Chọn phường xã</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleFormControlInput1">Địa chỉ</label>
                                            <input
                                                name="address"
                                                class="form-control" id="exampleFormControlInput1" type="text">
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
        $(document).ready(function () {
            $('#selectProvinces').on('change', function() {
                const provinceCode = $(this).val();
                $.ajax({
                    url: '{{ route('get.districts', ['id' => 'code']) }}'.replace('code', provinceCode),
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const selectDistrict = $('#selectDistricts')
                        selectDistrict.empty();

                        $.each(response.districts, function(index, district) {
                            selectDistrict.append('<option value="' + district.code + '">' + district.full_name + '</option>');
                        })
                    }
                })
            })

            $('#selectDistricts').on('change', function() {
                const districtCode = $(this).val();
                $.ajax({
                    url: '{{ route('get.wards', ['id' => 'code']) }}'.replace('code', districtCode),
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        const selectWard = $('#selectWards')
                        selectWard.empty();

                        $.each(response.wards, function(index, district) {
                            selectWard.append('<option value="' + district.code + '">' + district.full_name + '</option>');
                        })
                    }
                })
            })
        })
    </script>
@endsection
