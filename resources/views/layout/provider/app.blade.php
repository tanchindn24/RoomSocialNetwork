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
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
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
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/prism.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/date-picker.css')}}">
    <!-- the fileinput plugin styling CSS file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{URL::asset('assets/backend/provider/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/responsive.css')}}">
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
        <script>
            // initialize plugin with defaults
            $("#input-id").fileinput();
            // with plugin options
            $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
        </script>
    </div>
</div>
<!-- latest jquery-->
<script src="{{URL::asset('assets/backend/provider/assets/js/jquery-3.5.1.min.js')}}"></script>
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
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/dashboard/default.js')}}"></script>--}}
<script src="{{URL::asset('assets/backend/provider/assets/js/sidebar-menu.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/rating/jquery.barrating.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/rating/rating-script.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/ecommerce.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/product-list-custom.js')}}"></script>
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
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead/handlebars.js')}}"></script>--}}
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead/typeahead.bundle.js')}}"></script>--}}
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead/typeahead.custom.js')}}"></script>--}}
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead-search/handlebars.js')}}"></script>--}}
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead-search/typeahead-custom.js')}}"></script>--}}
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>

<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
    wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>

<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>

<!-- bootstrap.bundle.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 5.x or 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- the main fileinput plugin script JS file -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>

<!-- following theme script is needed to use the Font Awesome 5.x theme (`fa5`). Uncomment if needed. -->
<!-- script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script -->

<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/LANG.js"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{URL::asset('assets/backend/provider/assets/js/script.js')}}"></script>
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/theme-customizer/customizer.js')}}"></script>--}}
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
