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
	<div class="content">
		<div class="row">
			<div class="col-12">
				<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">Danh sách các loại phòng <span class="badge badge-primary">{{$loaiphong->count()}}</span></h5>
						</div>

						<div class="panel-body">
							Các <code>loại phòng</code> được liệt kê tại đây. <strong>Dữ liệu đang cập nhật.</strong>
						</div>
                        @if(session('thongbao'))
                        <div class="alert bg-success">
							<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
							<span class="text-semibold">Well done!</span>  {{session('thongbao')}}
						</div>
                        @endif
						<table class="table datatable-show-all">
							<thead>
								<tr class="bg-blue">
									<th>ID</th>
									<th>Tiêu đề</th>
									<th class="text-center"><a href="{{ route('categories.create') }}" class="btn btn-success">Thêm mới</a></th>
								</tr>
							</thead>
							<tbody>
								@foreach($loaiphong as $room)
								<tr>
									<td>{{$room->id}}</td>
									<td>{{$room->name}}</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>
			</div>
		</div>
	</div>
</div>
@endsection