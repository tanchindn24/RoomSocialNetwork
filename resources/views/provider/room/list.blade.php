@extends('layout.provider.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3 class="txt-primary">Danh sách phòng trọ</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('provider.index') }}"><i
                                        data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Provider</li>
                            <li class="breadcrumb-item active">Danh sách phòng trọ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row project-cards">
                <div class="col-md-12 project-list">
                    <div class="card">
                        @if(session('notification'))
                            <script> alert(' {{ session('notification') }} ') </script>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="nav nav-tabs border-tab" id="top-tab" role="tablist">
                                    @foreach($getDataRoom as $key => $value)
                                        <li class="nav-item"><a class="nav-link{{ $loop->first ? ' active' : '' }}"
                                                                id="home-{{ $loop->iteration }}"
                                                                data-bs-toggle="tab"
                                                                href="#top-home-{{ $loop->iteration }}" role="tab"
                                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}"><i
                                                    data-feather="home"></i>{{ $value[0]['house_name'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-sm btn-success" href="{{ route('provider.house.create') }}">Thêm
                                    Nhà</a>
                                <a class="btn btn-sm btn-primary" href="#">Phòng</a>
                                <a class="btn btn-sm btn-secondary" href="#">Khách thuê</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="top-tabContent">
                                @foreach ($getDataRoom as $key => $value)
                                    <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}"
                                         id="top-home-{{ $loop->iteration }}" role="tabpanel"
                                         aria-labelledby="home-{{ $loop->iteration }}">
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-sm btn-info" href="#">Thêm phòng nhanh</a>
                                            <a class="btn btn-sm btn-success"
                                               href="{{ route('provider.room.create') }}">Thêm
                                                phòng</a>
                                            <a class="btn btn-sm btn-primary" href="#">Sửa nhà</a>
                                            <a class="btn btn-sm btn-danger" href="#">Xóa nhà</a>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            @foreach ($value as $room)
                                                <div class="col-xxl-4 col-lg-6">
                                                    <div class="project-box"><span
                                                            class="badge badge-primary">Doing</span>
                                                        <h6>{{ $room['room_name'] }}</h6>
                                                        <div class="media"><img class="img-20 me-1 rounded-circle"
                                                                                src="{{asset('assets/backend/provider/assets/images/user/3.jpg')}}"
                                                                                alt="" data-original-title="" title="">
                                                            <div class="media-body">
                                                                <p>Themeforest, australia</p>
                                                            </div>
                                                        </div>
                                                        <p>Lorem Ipsum is simply dummy text of the printing and
                                                            typesetting
                                                            industry.</p>
                                                        <div class="row details">
                                                            <div class="col-6"><span>Issues </span></div>
                                                            <div class="col-6 text-primary">12</div>
                                                            <div class="col-6"><span>Resolved</span></div>
                                                            <div class="col-6 text-primary">5</div>
                                                            <div class="col-6"><span>Comment</span></div>
                                                            <div class="col-6 text-primary">7</div>
                                                        </div>
                                                        <div class="customers">
                                                            <ul>
                                                                <li class="d-inline-block"><img
                                                                        class="img-30 rounded-circle"
                                                                        src="{{asset('assets/backend/provider/assets/images/user/3.jpg')}}"
                                                                        alt="" data-original-title=""
                                                                        title=""></li>
                                                                <li class="d-inline-block"><img
                                                                        class="img-30 rounded-circle"
                                                                        src="{{asset('assets/backend/provider/assets/images/user/5.jpg')}}"
                                                                        alt="" data-original-title=""
                                                                        title=""></li>
                                                                <li class="d-inline-block"><img
                                                                        class="img-30 rounded-circle"
                                                                        src="{{asset('assets/backend/provider/assets/images/user/1.jpg')}}"
                                                                        alt="" data-original-title=""
                                                                        title=""></li>
                                                                <li class="d-inline-block ms-2">
                                                                    <p class="f-12">+10 More</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="project-status mt-4">
                                                            <div class="media mb-0">
                                                                <p>70% </p>
                                                                <div class="media-body text-end"><span>Done</span></div>
                                                            </div>
                                                            <div class="progress" style="height: 5px">
                                                                <div
                                                                    class="progress-bar-animated bg-primary progress-bar-striped"
                                                                    role="progressbar" style="width: 70%"
                                                                    aria-valuenow="10"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--links--}}
        <!-- Container-fluid Ends-->
    </div>
@endsection
