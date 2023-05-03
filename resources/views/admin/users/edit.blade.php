@extends('admin.layout.master')
@section('content2')
<!-- Main content -->
<div class="content-wrapper">
	<!-- Page header -->
		<div class="breadcrumb-line">
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
			  <li class="breadcrumb-item"><a href="/admin">Danh sách người dùng</a></li>
			  <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa người dùng {{$user->name}}</li>
			  </ol>
		  </div>
	</div>
	<!-- /page header -->
	<div class="content">
		<div class="row">
			<div class="col-md-8">
				
				<div class="content-group border-top-lg border-top-primary">
					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-body">
							<div style="margin-bottom:10px; font-size: font-size: 15px;">Nếu bạn không muốn thay đổi <code>Mật khẩu</code> thì hãy để trống 2 trường nhập giá trị mật khẩu.</div>
							@if(count($errors)>0)
							<div class="alert bg-danger">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold">Lỗi!</span><br>
								@foreach($errors->all() as $err)
								{{$err}}<br>
								@endforeach
							</div>
							@endif
							@if(session('thongbao'))
							<div class="alert bg-warning">
								<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
								<span class="text-semibold"><i class="fa fa-check-circle"></i></span>  {{session('thongbao')}}
							</div>
							@endif			
							<form action="{{ route('admin.user.edit', ['id'=> $user->id])}}" method="POST">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<div class="row">
									<div class="form-group">
										<label class="control-label col-lg-2">Tài khoản</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-git-pull-request"></i></span>
												<input type="text" readonly="" name="username" value="{{$user->username}}" class="form-control" placeholder="username lớn hơn 4 kí tự">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Email</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-git-pull-request"></i></span>
												<input type="email" readonly="" value="{{$user->email}}" name="email" class="form-control" placeholder="Nhập email">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Họ Tên</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-git-pull-request"></i></span>
												<input type="text" value="{{$user->name}}" name="HoTen" class="form-control" placeholder="Nhập đầy đủ họ tên">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Mật khẩu</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-git-pull-request"></i></span>
												<input type="password" value="" name="password" class="form-control password" placeholder="Mật khẩu lớn hơn 3 và nhỏ hơn 32 kí tự">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-2">Nhập lại Mật khẩu</label>
										<div class="col-lg-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-git-pull-request"></i></span>
												<input type="password" value="" name="repassword" class="form-control password" placeholder="">
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Chọn quyền:</label>
										<div class="col-lg-10">
											<select class="form-control" name="Quyen">
												<option 
												@if($user->right == 1)
												selected=""
												@endif
												value="1">Quản trị viên</option>
												<option
												@if($user->right == 0)
												selected=""
												@endif
												value="0">Người dùng</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Trạng thái:</label>
										<div class="col-lg-10">
											<select class="form-control" name="TinhTrang">
												<option 
												@if($user->tinhtrang == 1)
												selected=""
												@endif
												value="1">Kích hoạt</option>
												<option
												@if($user->tinhtrang == 0)
												selected=""
												@endif
												value="0">Tạm khóa</option>
											</select>
										</div>
									</div>
									<center>
										<input type="submit" style="margin-top:20px" value="Chỉnh sửa" class="btn btn-success btn-rounded">
									</center>
									
								</div>
								<p></p>
								
							</form>
						</div>


					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="content-group border-top-lg border-top-danger">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title"><span class="badge badge-primary"></span> Chú ý  </h5>
						</div>
						<div class="panel-body">
							<span class="badge badge-success" style="margin-bottom: 5px; font-size: 15px;">Bỏ trống 2 trường giá trị mật khẩu nếu không thay đổi</span>
							<span class="badge badge-danger" style="margin-bottom: 5px; font-size: 15px;">Mật khẩu lớn hơn 3 và nhỏ hơn 32 kí tự</span>
							<span class="badge badge-primary"style="font-size: 15px;">Bỏ trống 2 trường giá trị mật khẩu nếu không thay đổi</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer -->
		<div class="footer text-muted">
			&copy; 2019. <a href="#">Project Bất động sản Hà Nội</a> by <a href="" target="_blank">Chu Sỹ Tùng</a>
		</div>
		<!-- /footer -->
	</div>
</div>
@endsection