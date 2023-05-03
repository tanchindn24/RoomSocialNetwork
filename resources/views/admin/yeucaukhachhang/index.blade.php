@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách yêu cầu từ khách hàng</li>
        </ol>
	</div>
<!-- /page header -->
<div class="col-md-12 col-sm-12  ">
	<div class="x_panel">
	  <div class="x_title">
		<h2>Tất cả yêu cầu:<small>0</small></h2>
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		
		@if(session('thongbao'))
		<div class="alert bg-secondary">
			<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
			<span style="font-size:15px" class="badge badge-light">{{session('thongbao')}}</span>
		</div>
		@endif
		<div class="table-responsive">
		  <table class="table table-striped jambo_table bulk_action">
			<thead>
			  <tr class="headings">
          <th>
            <input type="checkbox" id="check-all" class="flat">
          </th>
          <th class="column-title">Tên người gửi </th>
          <th class="column-title">SDT </th>
          <th class="column-title">Email </th>       
          <th class="column-title">Mã phòng </th>
          <th class="column-title">Loại </th>
    	  <th class="column-title">Giá </th>
          <th class="column-title">Ngày gửi </th>
          <th class="column-title">Mục đích </th>							
          <th class="bulk-actions" colspan="8">
            
          </th>
          </tr>
			</thead>

			<tbody>
                @foreach($yeucau as $listyeucau)
			  <tr class="even pointer">
				<td class="a-center ">
				  <input type="checkbox" class="flat" name="table_records">
				</td>
				<td class=" ">{{ $listyeucau->user->name }}</td>
				<td class=" ">{{ $listyeucau->phone_user }}</td>
				<td class=" ">{{ $listyeucau->email_user }}</td>
				<td class=" ">{{ $listyeucau->motelroom->coderoom }}</td>
                <td class=" ">{{ $listyeucau->motelroom->category->name }}</td>
				<td class=" ">{{ number_format($listyeucau->motelroom->price) }} đ</td>
				<td class=" ">{{ date("d/m/Y", strtotime($listyeucau->created_at)) }}</td>
				<td class=" ">
					@if($listyeucau->status==1)
					<span class="badge badge-primary"> Yêu cầu thuê</span>
					@elseif($listyeucau->status==2)
					<span class="badge badge-success"> Yêu cầu đặt cọc</span>
					@endif
				</td>
			  </tr>
				 @endforeach
			</tbody>
		  </table>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-end">
				
			</ul>
		</nav>
	  </div>
	</div>
  </div>
</div>

@endsection