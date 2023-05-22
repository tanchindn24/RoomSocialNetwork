<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{URL::asset('assets/backend/admin/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{URL::asset('assets/backend/admin/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Admin</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@800&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
          rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/date-picker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/owlcarousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/rating.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/dropzone.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{URL::asset('assets/backend/admin/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/backend/admin/assets/css/responsive.css')}}">
</head>
<body onload="startTime()">
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
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                   placeholder="Tìm kiếm .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span></div>
                            <i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper"><a href="{{route('admin.index')}}"><img class="img-fluid"
                                                                                  src="{{URL::asset('assets/backend/admin/assets/images/logo/logo.png')}}"
                                                                                  alt=""></a></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                                               data-feather="align-center"></i></div>
            </div>
            <div class="left-header col horizontal-wrapper ps-0"></div>
            <div class="nav-right col-8 pull-right right-header p-0">
                <ul class="nav-menus">
                    <li class="language-nav">
                        <div class="translate_wrapper">
                            <div class="current_lang">
                                <div class="lang"><i class="flag-icon flag-icon-us"></i><span
                                        class="lang-txt">EN                               </span></div>
                            </div>
                            <div class="more_lang">
                                <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span
                                        class="lang-txt">English<span> (US)</span></span></div>
                                <div class="lang" data-value="vn"><i class="flag-icon flag-icon-vn"></i><span
                                        class="lang-txt">Việt Nam</span></div>
                            </div>
                        </div>
                    </li>
                    <li><span class="header-search"><i data-feather="search"></i></span></li>
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                    <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        <div class="media profile-media"><img class="b-r-10"
                                                              src="{{URL::asset('assets/backend/admin/assets/images/dashboard/profile.jpg')}}"
                                                              alt="">
                            <div class="media-body"><span>{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                                <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                            <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                            <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                            <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                            <li><a href="{{ route('admin.logout') }}"><i data-feather="log-in"> </i><span>Logout</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->
    <!-- Page Body Start -->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start -->
        @include('layout.admin.menu')
        <!-- Page Sidebar Ends-->
        @yield('content')
        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0">Copyright @php echo date('Y') @endphp © Bản quyền thuộc về Thanh Trường Developer. </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- latest jquery-->
<script src="{{URL::asset('assets/backend/admin/assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{URL::asset('assets/backend/admin/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{URL::asset('assets/backend/admin/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{URL::asset('assets/backend/admin/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{URL::asset('assets/backend/admin/assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{URL::asset('assets/backend/admin/assets/js/dashboard/default.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/sidebar-menu.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/rating/jquery.barrating.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/rating/rating-script.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/ecommerce.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/product-list-custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/tooltip-init.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/dashboard/default.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/notify/index.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/typeahead-search/typeahead-custom.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/dropzone/dropzone.js')}}"></script>
<script src="{{URL::asset('assets/backend/admin/assets/js/dropzone/dropzone-script.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{URL::asset('assets/backend/admin/assets/js/script.js')}}"></script>
{{--<script src="{{URL::asset('assets/backend/admin/assets/js/theme-customizer/customizer.js')}}"></script>--}}
<!-- login js-->
<!-- Plugin used-->
</body>
</html>
