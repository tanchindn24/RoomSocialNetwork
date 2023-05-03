@extends('layouts.admin.master')
@section('content')
    <section class="content-main">
        <div class="content-header">
            <h2 class="content-title">Thông tin cá nhân</h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row gx-5">
                    <aside class="col-lg-3 border-end">
                        <nav class="nav nav-pills flex-lg-column mb-4">
                            <a class="nav-link active" aria-current="page" href="#">Thông tin</a>
                            <a class="nav-link" href="#">Moderators</a>
                            <a class="nav-link" href="#">Admin account</a>
                            <a class="nav-link" href="#">SEO settings</a>
                            <a class="nav-link" href="#">Mail settings</a>
                            <a class="nav-link" href="#">Newsletter</a>
                        </nav>
                    </aside>
                    <div class="col-lg-9">
                        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                        <section class="content-body p-xl-4">
                            <form method="post" action="{{route('admin-profile-changes', $info->id)}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row gx-3">
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Tên</label>
                                                <input class="form-control" type="text" name="txt_name" placeholder="Type here" value="{{$info->name}}" />
                                                @error('txt_name')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-6 mb-3">
                                                <label class="form-label">Ngày sinh</label>
                                                <input class="form-control" type="date" name="txt_birthday" placeholder="Type here" value="{{$info->ngay_sinh}}"/>
                                                @error('txt_birthday')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="email" name="txt_email" placeholder="example@mail.com" disabled value="{{$info->email}}"/>
                                                @error('txt_email')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Số điện thoại</label>
                                                <input class="form-control" type="tel" name="txt_phone" placeholder="+1234567890" value="{{$info->phone}}"/>
                                                @error('txt_phone')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">CCCD</label>
                                                <input class="form-control" type="tel" name="txt_cccd" placeholder="+1234567890" value="{{$info->cccd}}"/>
                                                @error('txt_cccd')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label">Ngày cấp</label>
                                                <input class="form-control" type="date" name="txt_ngaycap" value="{{$info->ngay_cap_cccd}}"/>
                                                @error('txt_ngaycap')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label">Nơi cấp cccd</label>
                                                <input class="form-control" type="text" name="txt_noicap" placeholder="Type here" value="{{$info->noi_cap_cccd}}"/>
                                                @error('txt_noicap')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label">Địa chỉ</label>
                                                <input class="form-control" type="text" name="txt_location" placeholder="Type here" value="{{$info->dia_chi}}"/>
                                                @error('txt_location')
                                                <span role="alert">
                                                        <strong style="color: darkred">{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <!-- col .// -->
                                        </div>
                                        <!-- row.// -->
                                    </div>
                                    <!-- col.// -->
                                    <aside class="col-lg-4">
                                        <figure class="text-lg-center">
                                            <img class="img-lg mb-3 img-avatar" src="/public/assets/back-end/imgs/avatar/{{Auth::user()->avatar}}" alt="User Photo" />
                                            <figcaption>
                                                <input class="btn btn-light rounded font-md" type="file"/>Upload
                                            </figcaption>
                                        </figure>
                                    </aside>
                                    <!-- col.// -->
                                </div>
                                <!-- row.// -->
                                <br />
                                <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                            </form>
                            <hr class="my-5" />
                            <div class="row" style="max-width: 920px">
                                <div class="col-md">
                                    <article class="box mb-3 bg-light">
                                        <a class="btn float-end btn-light btn-sm rounded font-md" href="#">Đổi</a>
                                        <h6>Mật khẩu</h6>
                                        <small class="text-muted d-block" style="width: 70%">Thay đổi mật khẩu tại đây.</small>
                                    </article>
                                </div>
                                <!-- col.// -->
                                <div class="col-md">
                                    <article class="box mb-3 bg-light">
                                        <a class="btn float-end btn-light rounded btn-sm font-md" href="#">Thay đổi</a>
                                        <h6>Phân quyền</h6>
                                        <small class="text-muted d-block" style="width: 70%">Thay đổi vai trò tại đây.</small>
                                    </article>
                                </div>
                                <!-- col.// -->
                            </div>
                            <!-- row.// -->
                        </section>
                        <!-- content-body .// -->
                    </div>
                    <!-- col.// -->
                </div>
                <!-- row.// -->
            </div>
            <!-- card body end// -->
        </div>
        <!-- card end// -->
    </section>
    <!-- content-main end// -->
@endsection
