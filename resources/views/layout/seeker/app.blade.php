<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Nest Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/backend/seeker/imgs/theme/favicon.svg')}}" />
    <!-- Template CSS -->
    <link href="{{asset('assets/backend/seeker/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="screen-overlay"></div>
<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
        <a href="{{ route('seeker.index') }}" class="brand-wrap">
            <img src="{{asset('assets/backend/seeker/imgs/theme/logo.svg')}}" class="logo" alt="Nest Dashboard" />
        </a>
        <div>
            <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
        </div>
    </div>
    <nav>
        @include('layout.seeker.menu')
    </nav>
</aside>
<main class="main-wrap">
    @include('layout.seeker.header')
    @yield('content')
    <!-- content-main end// -->
    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Nest - HTML Ecommerce Template .
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">All rights reserved</div>
            </div>
        </div>
    </footer>
</main>
<script src="{{asset('assets/backend/seeker/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/backend/seeker/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/seeker/js/vendors/select2.min.js')}}"></script>
<script src="{{asset('assets/backend/seeker/js/vendors/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/backend/seeker/js/vendors/jquery.fullscreen.min.js')}}"></script>
<script src="{{asset('assets/backend/seeker/js/vendors/chart.js')}}"></script>
<!-- Main Script -->
<script src="{{asset('assets/backend/seeker/js/main.js?v=1.1')}}" type="text/javascript"></script>
<script src="{{asset('assets/backend/seeker/js/custom-chart.js')}}" type="text/javascript"></script>
</body>
</html>
