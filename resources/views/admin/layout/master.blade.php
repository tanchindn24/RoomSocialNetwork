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
    <title>Trang Quản Trị Phòng Trọ</title>

    <!-- Bootstrap -->
    <link href="{{asset('/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('/css/custom.min.css')}}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{asset('/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
    {{-- Facebox --}}
    <link href="{{asset('/facebox/src/facebox.css')}}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{asset('/facebox/src/facebox.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('/facebox/lib/jquery.js')}}" type="text/javascript"></script>
    <script src="{{asset('/facebox/src/facebox.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
        loadingImage : '/facebox/src/loading.gif',
        closeImage   : '/facebox/src/buttonclose.png'
        })
      })
      </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/admin" class="site_title"><i class="fa fa-home"></i><span> Phòng Trọ VKU</span></a>
            </div>
            <div class="clearfix"></div>
              <br />
            <!-- sidebar menu -->
           @include('admin.layout.menu')
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        @include('admin.layout.nav')
        <!-- /top navigation -->
       <div class="right_col" role="main">
        <!-- Main content -->
        	@yield('content2')
		<!-- /Main content -->       
      </div>
    </div>
     <!-- footer content -->
     <footer>
      <div class="pull-right">
        ©2022 phát triển ứng dụng Phòng Trọ VKU by <a href="/">20IT461 - 20IT303</a>
      </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content --> 
  </div>
    <!-- jQuery -->
    <script src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js --> 
    <script src="{{asset('/vendors/Chart.js/dist/Chart.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('/vendors/switchery/dist/switchery.min.js')}}"></script>
    <script src="{{asset('/assets/js/fileinput/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/js/fileinput/vi.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('/assets/fileinput.css')}}">
    <!-- Custom Theme Scripts -->
    <script src="/js/custom.js"></script>
    <script type="text/javascript" src="{{asset('/assets/toast/toastr.min.js')}}"></script>
    {{-- upload img --}}
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
      {{-- slug --}}
    <script type="text/javascript">
      function ChangeToSlug()
          {
              var slug;
           
              //Lấy text từ thẻ input title 
              slug = document.getElementById("slug").value;
              slug = slug.toLowerCase();
              //Đổi ký tự có dấu thành không dấu
                  slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                  slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                  slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                  slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                  slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                  slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                  slug = slug.replace(/đ/gi, 'd');
                  //Xóa các ký tự đặt biệt
                  slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                  //Đổi khoảng trắng thành ký tự gạch ngang
                  slug = slug.replace(/ /gi, "-");
                  //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                  //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                  slug = slug.replace(/\-\-\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-\-/gi, '-');
                  slug = slug.replace(/\-\-/gi, '-');
                  //Xóa các ký tự gạch ngang ở đầu và cuối
                  slug = '@' + slug + '@';
                  slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                  //In slug ra textbox có id “slug”
              document.getElementById('convert_slug').value = slug;
          }   
    </script>
  </body>
  {{-- load tỉnh thành phố --}}
  <script type="text/javascript">
    $(document).ready(function(){
        $('.chon').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            // alert(ma_id);
            // alert(token);
            if (action=='thanhpho') {
                result = 'quanhuyen';
            }else {
                result = 'xaphuong';
            }

            $.ajax({
                url: '{{url('/get-select')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data)
                {
                    $('#'+result).html(data);
                }
            });
        });
    })
  </script>
</html>
