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
        <br/>
        <form action="{{ route('admin.dientro.nhapsodien', ['id'=>$chitiet->id]) }}">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Ngày nhập</label>
              <input type="date" class="form-control" name="ngaynhap">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Giá điện</label>
              <input type="number" class="form-control" name="giadien">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Số điện cũ</label>
              <input type="number" class="form-control" name="sodientruoc" value="{{ $sodientruoc->sotruoc }}">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Số điện mới</label>
              <input type="number" class="form-control" name="sodienmoi">
            </div>
          </div>
          <button type="submit" class="btn btn-success">Lưu</button>
        </form>
    </div>
 <!-- jQuery -->
 <script src="/public/vendors/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap -->
 <script src="/public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <!-- FastClick -->
 <script src="/public/vendors/fastclick/lib/fastclick.js"></script>
 <!-- NProgress -->
 <script src="/public/vendors/nprogress/nprogress.js"></script>
 <!-- Chart.js --> 
 <script src="/public/vendors/Chart.js/dist/Chart.js"></script>
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
 <!-- Datatables -->
 <script src="/public/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="/public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <script src="/public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
 <script src="/public/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
 <script src="/public/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
 <script src="/public/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
 <script src="/public/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
 <script src="/public/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
 <script src="/public/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
 <script src="/public/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
 <script src="/public/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
 <script src="/public/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
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
</html>