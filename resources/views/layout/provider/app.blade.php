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
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/provider/assets/css/vendors/dropzone.css')}}">
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
            var map;

            function initMap() {
                map = new google.maps.Map(
                    document.getElementById('map'),
                    {center: new google.maps.LatLng(-33.91700, 151.233), zoom: 18});

                var iconBase =
                    'assets/backend/provider/assets/images/dashboard-2/';

                var icons = {
                    userbig: {
                        icon: iconBase + '1.png'
                    },
                    library: {
                        icon: iconBase + '3.png'
                    },
                    info: {
                        icon: iconBase + '2.png'
                    }
                };

                var features = [
                    {
                        position: new google.maps.LatLng(-33.91752, 151.23270),
                        type: 'info'
                    }, {
                        position: new google.maps.LatLng(-33.91700, 151.23280),
                        type: 'userbig'
                    }, {
                        position: new google.maps.LatLng(-33.91727341958453, 151.23348314155578),
                        type: 'library'
                    }
                ];

                // Create markers.
                for (var i = 0; i < features.length; i++) {
                    var marker = new google.maps.Marker({
                        position: features[i].position,
                        icon: icons[features[i].type].icon,
                        map: map
                    });
                }
                ;
            }
        </script>
        <script async="" defer=""
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGCQvcXUsXwCdYArPXo72dLZ31WS3WQRw&amp;callback=initMap"></script>
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
<script src="{{URL::asset('assets/backend/provider/assets/js/dashboard/default.js')}}"></script>
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
<script src="{{URL::asset('assets/backend/provider/assets/js/dashboard/default.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/notify/index.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{URL::asset('assets/backend/provider/assets/js/dropzone/dropzone-script.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{URL::asset('assets/backend/provider/assets/js/script.js')}}"></script>
{{--<script src="{{URL::asset('assets/backend/provider/assets/js/theme-customizer/customizer.js')}}"></script>--}}
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
