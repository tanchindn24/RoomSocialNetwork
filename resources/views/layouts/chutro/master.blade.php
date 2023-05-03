<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Dashboard Chủ trọ</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!--JS Custom-->
    <script type="text/javascript" src="{{URL::asset('public/assets/back-end/js/helper.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('public/assets/back-end/js/jsformat.js')}}"></script>
    <!-- CDN Bootstrap and fontawesome !-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" crossorigin="anonymous"/>
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
<div class="screen-overlay"></div>
    @include('layouts.chutro.menu')
<main class="main-wrap">
    @include('layouts.chutro.nav')
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
