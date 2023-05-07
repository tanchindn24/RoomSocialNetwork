<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Social MotellRoom</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:title" content=""/>
    <meta property="og:type" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/frontend/imgs/theme/favicon.svg')}}"/>
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{URL::asset('assets/frontend/css/main.css?v=4.0')}}"/>
</head>

<body>
<main class="main pages">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                    <div class="row">
                        <div class="col-lg-6 pr-30 d-none d-lg-block">
                            <img class="border-radius-15" src="{{URL::asset('assets/frontend/imgs/page/login.jpg')}}" alt=""/>
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <div class="login_wrap widget-taber-content background-white">
                                <div class="padding_eight_all bg-white">
                                    <div class="heading_s1">
                                        <h1 class="mb-5">Login</h1>
                                        <p class="mb-30">Don't have an account? <a href="{{route('register')}}">Create here</a></p>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if(session('notification'))
                                            <div class="alert alert-danger alert-dismissible " role="alert">
                                                {{session('notification')}}.
                                            </div>
                                        @endif
                                    </div>
                                    <form action="{{route('login.store')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" required="" name="email" placeholder="Username or Email *" />
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" name="password" placeholder="Your password *" />
                                        </div>
                                        <div class="login_footer form-group mb-50">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="" />
                                                    <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                </div>
                                            </div>
                                            <a class="text-muted" href="#">Forgot password?</a>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-heading btn-block hover-up" name="login">Log in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img src="https://media.giphy.com/media/sSgvbe1m3n93G/giphy.gif" alt=""/>
            </div>
        </div>
    </div>
</div>

<!-- Vendor JS-->
<script src="{{URL::asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/slick.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/wow.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/magnific-popup.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/waypoints.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/counterup.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/images-loaded.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/isotope.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/scrollup.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{URL::asset('assets/frontend/js/plugins/jquery.elevatezoom.js')}}"></script>
<!-- Template  JS -->
<script src="{{URL::asset('assets/frontend/js/main.js?v=4.0')}}"></script>
<script src="{{URL::asset('assets/frontend/js/shop.js?v=4.0')}}"></script>
</body>
</html>
