@extends('layouts.chutro.master')
@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Thêm phòng trọ</h2>
                    <div>
                        <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                        <button class="btn btn-md rounded font-sm hover-up">Publich</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Thông tin Phòng</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Tên phòng</label>
                                <input type="text" placeholder="nhập tên phòng" class="form-control" name="tenphong" />
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Diện tích</label>
                                        <div class="row gx-2">
                                            <input placeholder="..." type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-4">
                                        <label class="form-label">Giá</label>
                                        <input placeholder="..." type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label class="form-label">Loại Phòng</label>
                                    <select class="form-select" name="loaiphong">
                                        <option value="0">Chọn loại phòng</option>
                                        @foreach($loaiphong as $list_lp)
                                        <option value="{{$list_lp->id}}">{{$list_lp->ten}} - @if($list_lp->mota==1) Tầm trung @elseif($list_lp->mota==2) Cao cấp @endif</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Tax rate</label>
                                <input type="text" placeholder="%" class="form-control" id="product_name" />
                            </div>
                            <label class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" value="" />
                                <span class="form-check-label"> Make a template </span>
                            </label>
                        </form>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Width</label>
                                        <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Height</label>
                                        <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Weight</label>
                                <input type="text" placeholder="gam" class="form-control" id="product_name" />
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Shipping fees</label>
                                <input type="text" placeholder="$" class="form-control" id="product_name" />
                            </div>
                        </form>
                    </div>
                </div>
                <!-- card end// -->
            </div>
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="/public/assets/back-end/imgs/theme/upload.svg" alt="" />
                            <form enctype="multipart/form-data">
                                <input multiple class="form-control" type="file" />
                            </form>
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Organization</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select">
                                    <option>Automobiles</option>
                                    <option>Home items</option>
                                    <option>Electronics</option>
                                    <option>Smartphones</option>
                                    <option>Sport items</option>
                                    <option>Baby and Tous</option>
                                </select>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Sub-category</label>
                                <select class="form-select">
                                    <option>Nissan</option>
                                    <option>Honda</option>
                                    <option>Mercedes</option>
                                    <option>Chevrolet</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Tags</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <!-- row.// -->
                    </div>
                </div>
                <!-- card end// -->
            </div>
        </div>
    </section>
@endsection
