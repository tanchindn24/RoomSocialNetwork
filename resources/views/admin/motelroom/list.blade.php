@extends('admin.layout.master')
@section('content2')

<!-- Main content -->
<div class="content-wrapper">
	<div class="breadcrumb-line">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách phòng trọ</li>
        </ol>
	</div>
<!-- /page header -->
<div class="col-md-12 col-sm-12  ">
	<div class="x_panel">
	  <div class="x_title">
		<h2>Tổng số phòng trọ:<small>0</small></h2>
		<div class="clearfix"></div>
	  </div>
	  <div class="x_content">
		<p>Toàn bộ <code>tin đăng</code> của bạn được hiển thị ở đây</p>
		@if(session('thongbao'))
		<div class="alert bg-secondary">
			<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
			<span style="font-size:15px" class="badge badge-light">{{session('thongbao')}}</span>
		</div>
		@endif
		<div class="table-responsive">
		  <table class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
			  <tr class="headings">
				<th class="column-title">Mã phòng </th>
				<th class="column-title">Loại </th>
				<th class="column-title">Ngày đăng </th>
				<th class="column-title">Luợt xem </th>
				<th class="column-title">Tiêu đề </th>
				<th class="column-title">Giá </th>
				<th class="column-title">Trạng thái </th>					
				<th class="column-title no-link last"><span class="nobr"><i class="fa fa-bars"></i></span>
				</th>
			  </tr>
			</thead>

			<tbody>
				@foreach ($motelrooms as $postsroom)
			  <tr class="even pointer">
				<td class=" ">{{ $postsroom->id }}</td>
				<td class=" ">{{ $postsroom->category->name }}</td>
				<td class=" ">{{ date('d/m/Y', strtotime($postsroom->created_at)) }} </td>
				<td class=" ">{{ $postsroom->count_view }}</td>
				<td class=" "><a class="d-inline-block text-truncate" style="max-width:350px" href="/phongtro/{{$postsroom->slug}}">{{ $postsroom->title }}</a></td>
				<td class=" ">{{ number_format($postsroom->price)}} đ</td>
				<td class=" ">
					@if($postsroom->approve==1) 
						<button type="button" class="btn btn-round btn-primary">tin hiển thị</button>
					@elseif($postsroom->approve==0)
						<button type="button" class="btn btn-round btn-secondary">tin đang ẩn</button>
					@endif
				</td>
				<td class=" last">
					<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					Thay đổi
				  </button>
				  <div class="dropdown-menu">
					  @if($postsroom->approve==1)
					  <a class="dropdown-item" href="/admin/motelrooms/unapprove/{{$postsroom->id}}"><i class="fa fa-check-circle-o"></i> ẩn tin</a>
					  @elseif($postsroom->approve==0)
					  <a class="dropdown-item" href="/admin/motelrooms/approve/{{$postsroom->id}}"><i class="fa fa-check-circle-o"></i> hiển thị tin</a>
					  @endif
					  <a class="dropdown-item" href="/admin/motelrooms/del/{{$postsroom->id}}"><i class="fa fa-trash-o"></i> Xóa</a></button>
				  </div>
				</td>
			  </tr>
				  @endforeach
			</tbody>
		  </table>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-end">
				{{ $motelrooms->links() }}
			</ul>
		</nav>
	  </div>
	</div>
  </div>
</div>

@endsection