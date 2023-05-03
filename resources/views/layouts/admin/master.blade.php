<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard Admin</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('public/assets/back-end/imgs/theme/favicon.svg')}}" />
    <!-- Template CSS -->
    <link href="{{URL::asset('public/assets/back-end/css/main.css?v=1.1')}}" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="screen-overlay"></div>
    @include('layouts.admin.menu')
<main class="main-wrap">
    @include('layouts.admin.nav')
    @yield('content')
    <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear());
                </script>
                &copy; Phòng CTSV - Phòng Trọ VKU .
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end">Dev: Phạm Thanh Trường - 20IT461</div>
            </div>
        </div>
    </footer>
</main>
<script src="{{URL::asset('public/assets/back-end/js/vendors/jquery-3.6.0.min.js')}}"></script>
<script src="{{URL::asset('public/assets/back-end/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{URL::asset('public/assets/back-end/js/vendors/select2.min.js')}}"></script>
<script src="{{URL::asset('public/assets/back-end/js/vendors/perfect-scrollbar.js')}}"></script>
<script src="{{URL::asset('public/assets/back-end/js/vendors/jquery.fullscreen.min.js')}}"></script>
<script src="{{URL::asset('public/assets/back-end/js/vendors/chart.js')}}"></script>
<!-- Main Script -->
<script src="{{URL::asset('public/assets/back-end/js/main.js?v=1.1')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/back-end/js/custom-chart.js')}}" type="text/javascript"></script>
</body>
</html>
