@extends('layout.admin.app')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Lists Users</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Users</li>
                            <li class="breadcrumb-item active">Lists Users</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/1.jpg" alt="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/3.jpg" alt="">
                        </div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>Mark Jecno</h5>
                            <h6>Manager</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Follower</h6>
                                <h5 class="counter">9564</h5>
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
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/2.jpg" alt="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/16.jpg"
                                                       alt=""></div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>Johan Deo</h5>
                            <h6>Designer</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Follower</h6>
                                <h5 class="counter">2578</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Following</h6>
                                <h5><span class="counter">26</span>K</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Total Post</h6>
                                <h5><span class="counter">96</span>M</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/3.jpg" alt="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/11.jpg"
                                                       alt=""></div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>Dev John</h5>
                            <h6>Devloper</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Follower</h6>
                                <h5 class="counter">6545</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Following</h6>
                                <h5><span class="counter">91</span>K</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Total Post</h6>
                                <h5><span class="counter">21</span>M</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/7.jpg" alt="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/16.jpg"
                                                       alt=""></div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>Johan Deo</h5>
                            <h6>Designer</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Follower</h6>
                                <h5 class="counter">2578</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Following</h6>
                                <h5><span class="counter">26</span>K</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Total Post</h6>
                                <h5><span class="counter">96</span>M</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/5.jpg" alt="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/11.jpg"
                                                       alt=""></div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>Dev John</h5>
                            <h6>Devloper</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Follower</h6>
                                <h5 class="counter">6545</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Following</h6>
                                <h5><span class="counter">91</span>K</h5>
                            </div>
                            <div class="col-4 col-sm-4">
                                <h6>Total Post</h6>
                                <h5><span class="counter">21</span>M</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-4 box-col-6">
                    <div class="card custom-card p-0">
                        <div class="card-header"><img class="img-fluid" src="../assets/images/user-card/6.jpg" alt="">
                        </div>
                        <div class="card-profile"><img class="rounded-circle" src="../assets/images/avtar/3.jpg" alt="">
                        </div>
                        <ul class="card-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                        <div class="text-center profile-details">
                            <h5>Mark Jecno</h5>
                            <h6>Manager</h6>
                        </div>
                        <div class="card-footer row">
                            <div class="col-4 col-sm-4">
                                <h6>Follower</h6>
                                <h5 class="counter">9564</h5>
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
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
