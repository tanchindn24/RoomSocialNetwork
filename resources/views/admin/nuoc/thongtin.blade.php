<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />
   {{-- Ajax --}}
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="/public/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/public/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/public/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/public/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/public/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/public/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/css/custom.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="/public/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    {{-- Facebox --}}
    <link href="/public/facebox/src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="/public/facebox/src/facebox.css" rel="stylesheet" type="text/css"/>
    <script src="/public/facebox/lib/jquery.js" type="text/javascript"></script>
    <script src="/public/facebox/src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
        loadingImage : '/public/facebox/src/loading.gif',
        closeImage   : '/public/facebox/src/buttonclose.png'
        })
      })
      </script>
  </head>
  <body>
    <div class="x_content">
        <table class="table table-striped jambo_table">
            <thead>
                <tr>
                    <th>Phòng</th>
                    <th>Số người</th>
                    <th>Số trước</th>
                    <th>Số hiện tại</th>
                    <th>Giá</th>
                    <th>Ngày nhập</th>
                    <th>Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                @foreach($nuoc as $nuoc)
                    <tr>
                        <td>{{ $nuoc->hopdong->phongtro->tenphong }}</td>
                        <td>{{ $nuoc->hopdong->khachthuethunhat->name }}</td>
                        <td>{{ $nuoc->sonuoccu }}</td>
                        <td>{{ $nuoc->sonuocmoi }}</td>
                        <td>{{ number_format($nuoc->gianuoc) }} đ</td>
                        <td>{{date('d-m-Y', strtotime($nuoc->ngaynhap))}}</td>
                        <td>{{ number_format(($nuoc->sonuocmoi - $nuoc->sonuoccu) * $nuoc->gianuoc) }} đ</td>
                    </tr>
                @endforeach
                </tbody>                   
        </table>
    </div>
<!-- jQuery -->
<script src="/public/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="/public/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="/public/vendors/nprogress/nprogress.js"></script>
<!-- gauge.js -->
<script src="/public/vendors/gauge.js/dist/gauge.min.js"></script>
<!-- bootstrap-progressbar -->
<script src="/public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="/public/vendors/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="/public/vendors/skycons/skycons.js"></script>
<!-- Flot -->
<script src="/public/vendors/Flot/jquery.flot.js"></script>
<script src="/public/vendors/Flot/jquery.flot.pie.js"></script>
<script src="/public/vendors/Flot/jquery.flot.time.js"></script>
<script src="/public/vendors/Flot/jquery.flot.stack.js"></script>
<script src="/public/vendors/Flot/jquery.flot.resize.js"></script>
<!-- Flot plugins -->
<script src="/public/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="/public/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="/public/vendors/flot.curvedlines/curvedLines.js"></script>
<!-- DateJS -->
<script src="/public/vendors/DateJS/build/date.js"></script>
<!-- JQVMap -->
<script src="/public/vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="/public/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="/public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="/public/vendors/moment/min/moment.min.js"></script>
<script src="/public/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/public/vendors/jszip/dist/jszip.min.js"></script>
<script src="/public/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="/public/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="/public/vendors/switchery/dist/switchery.min.js"></script>
<script src="/public/assets/js/fileinput/fileinput.js" type="text/javascript"></script>
<script src="/public/assets/js/fileinput/vi.js" type="text/javascript"></script>
<link rel="stylesheet" href="/public/assets/fileinput.css">
<!-- Custom Theme Scripts -->
<script src="/js/custom.js"></script>
<script type="text/javascript" src="/public/assets/toast/toastr.min.js"></script>
<script type="text/javascript">
  $('#format-file').fileinput({
    theme: 'fa',
    language: 'vi',
    showUpload: false,
    allowedFileExtensions: ['jpg', 'png', 'gif']
  });
</script>
<script type="text/javascript">
  $('#format-file1').fileinput({
    theme: 'fa',
    language: 'vi',
    showUpload: false,
    allowedFileExtensions: ['jpg', 'png', 'gif']
  });
</script>
<script type="text/javascript"> 
  function date() {
    var refresh=1000; // Refresh rate in milli seconds
    mytime=setTimeout('daterealtime()',refresh)
    }
    function daterealtime() {
    var time = new Date()
    var format=time.getDate() + "/" + (time.getMonth()+1) + "/" + time.getFullYear();
    format = format + " - " +  time.getHours( )+ ":" +  time.getMinutes() + ":" +  time.getSeconds();
    document.getElementById('realtime').innerHTML = format;
    date();      
    }
  </script>
</body>
</html>