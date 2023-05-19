<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{URL::asset('assets/backend/provider/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{URL::asset('assets/backend/provider/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Provider Dashboard</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/backend/provider/assets/css/vendors/jsgrid.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{URL::asset('assets/backend/provider/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/responsive.css')}}">
    {{--bootstrap-fileinput--}}
    <link href="{{asset('assets/bootstrap-fileinput/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/bootstrap-fileinput/themes/explorer-fa5/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" crossorigin="anonymous">
</head>
<body>
<!-- loader starts-->
<div class="loader-wrapper">
    <div class="loader-index"><span></span></div>
    <svg>
        <defs></defs>
        <filter id="goo">
            <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
            <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"></fecolormatrix>
        </filter>
    </svg>
</div>
<!-- loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    @include('layout.provider.nav_header')
    <!-- Page Header Ends-->
    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('layout.provider.menu')
        <!-- Page Sidebar Ends-->
        @yield('content')
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright @php echo date('Y') @endphp © Dashboard by Thanh Truong </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="{{URL::asset('assets/backend/provider/assets/js/jquery-3.6.0.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{URL::asset('assets/backend/provider/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{URL::asset('assets/backend/provider/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{URL::asset('assets/backend/provider/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{URL::asset('assets/backend/provider/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{URL::asset('assets/backend/provider/assets/js/sidebar-menu.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/rating/jquery.barrating.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/rating/rating-script.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/ecommerce.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/tooltip-init.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/notify/index.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>

<script src="{{asset('assets/bootstrap-fileinput/js/plugins/buffer.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/plugins/filetype.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/plugins/piexif.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/plugins/sortable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/fileinput.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/locales/fr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/locales/es.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/js/locales/vi.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/themes/gly/theme.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/themes/fa5/theme.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/bootstrap-fileinput/themes/explorer-fa5/theme.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/backend/provider/assets/js/jsgrid/jsgrid.min.js')}}"></script>
<script src="{{asset('assets/backend/provider/assets/js/jsgrid/griddata.js')}}"></script>
<script src="{{asset('assets/backend/provider/assets/js/jsgrid/jsgrid.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{URL::asset('assets/backend/provider/assets/js/script.js')}}"></script>
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/theme-customizer/customizer.js')}}"></script>--}}
<!-- login js-->
<!-- Plugin used-->
<script type="text/javascript">
    $('#format-file-create-post').fileinput({
        uploadUrl: '#',
        theme: 'fa',
        language: 'vi',
        showUpload: false,
        allowedFileExtensions: ['jpg', 'png', 'gif', 'jpeg'],
        maxFileSize: 10000,
    });
</script>
</body>
</html>
