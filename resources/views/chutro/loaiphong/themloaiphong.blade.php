@extends('layouts.chutro.master')
@section('content')
    <section class="content-main">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Thêm loại phòng</h2>
                    <div>
                        <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                        <button class="btn btn-md rounded font-sm hover-up">Publich</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body row">
                        <div class="row">
                            <div class="col-md-3">
                                <h6>1. General info</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Product title</label>
                                    <input type="text" placeholder="Type here" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Description</label>
                                    <textarea placeholder="Type here" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Brand name</label>
                                    <select class="form-select">
                                        <option> Adidas </option>
                                        <option> Nike </option>
                                        <option> Puma </option>
                                    </select>
                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr class="mb-4 mt-0">
                        <div class="row">
                            <div class="col-md-3">
                                <h6>2. Pricing</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Cost in USD</label>
                                    <input type="text" placeholder="$00.0" class="form-control">
                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr class="mb-4 mt-0">
                        <div class="row">
                            <div class="col-md-3">
                                <h6>3. Category</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" checked="" name="mycategory" type="radio">
                                        <span class="form-check-label"> Clothes </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Electronics </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Sports </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Automobiles </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Home interior </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Smartphones </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Books </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Kids item </span>
                                    </label>
                                    <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                        <input class="form-check-input" name="mycategory" type="radio">
                                        <span class="form-check-label"> Others </span>
                                    </label>
                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr class="mb-4 mt-0">
                        <div class="row">
                            <div class="col-md-3">
                                <h6>4. Media</h6>
                            </div>
                            <div class="col-md-9">
                                <div class="mb-4">
                                    <label class="form-label">Images</label>
                                    <input class="form-control" type="file">
                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- .row end// -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
