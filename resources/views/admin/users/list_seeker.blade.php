@extends('layout.admin.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Lists Seekers</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">Lists Seekers</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                @foreach($seeker as $value)
                    <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                        <div class="card custom-card p-0">
                            <div class="card-header"><img class="img-fluid" src="https://images.unsplash.com/photo-1545776312-71c1641b3849?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1187&q=80" alt="">
                            </div>
                            <div class="card-profile"><img class="rounded-circle" src="https://images.unsplash.com/photo-1597586124394-fbd6ef244026?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="">
                            </div>
                            <ul class="card-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                            <div class="text-center profile-details">
                                <h5>{{$value->name}}</h5>
                                <h6>Seeker</h6>
                            </div>
                            <div class="card-footer row">
                                <div class="col-4 col-sm-4">
                                    <h6>Status</h6>
                                    <h5 class="counter">
                                        @if($value->status == 1)
                                            <span class="text-success">Active</span>
                                        @else
                                            <span class="text-danger">Lock</span>
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <h6>Following</h6>
                                    <h5><span class="counter">49</span>K</h5>
                                </div>
                                <div class="col-4 col-sm-4">
                                    <h6>Total Post</h6>
                                    <h5><span class="counter">96</span>M</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{$seeker->links()}}
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
