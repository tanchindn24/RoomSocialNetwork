@extends('layouts.master')
@section('content')
<?php
function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
		'y' => 'năm',
		'm' => 'tháng',
		'w' => 'tuần',
		'd' => 'ngày',
		'h' => 'giờ',
		'i' => 'phút',
		's' => 'giây',
	);
	foreach ($string as $k => &$v) {
		if ($diff->$k) {
			$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
		} else {
			unset($string[$k]);
		}
	}
	if (!$full) $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
}
?>
<div class="col-lg-10 m-auto">
    <div class="row">
        <div class="col-md-3">
            <div class="dashboard-menu">
                <ul class="nav flex-column" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-pencil mr-10"></i>Tin đã đăng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>Thông tin cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Cập nhật thông tin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user/logout"><i class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content account dashboard-content pl-50">
                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Chào {{ Auth::user()->name }}!</h3>
                            <h5 class="mb-0">Tham gia {{ date('d/m/Y', strtotime(Auth::user()->created_at)) }}</h5>
                        </div>
                        <div class="card-body">
                            <p>
                                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Danh sách tin đã đăng</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <th>Loại</th>
                                        <th>Giá</th>
                                        <th>Ngày đăng</th>
                                        <th>Lượt xem</th>
                                        <th>Trạng thái</th>
                                        <th>Xem / Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mypost as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ number_format($post->price) }}</td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->count_view }}</td>
                                        <td>
                                            @if($post->approve == 1)
                                                <span class="label label-success">Đã kiểm duyệt</span>
                                            @elseif($post->approve == 0)
                                                <span class="label label-danger">Chờ Phê Duyệt</span>
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn-small d-block">Xem</a><a href="#" class="btn-small d-block">Xóa</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">Orders tracking</h3>
                        </div>
                        <div class="card-body contact-from-area">
                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                            <div class="row">
                                <div class="col-lg-8">
                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                        <div class="input-style mb-20">
                                            <label>Order ID</label>
                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" />
                                        </div>
                                        <div class="input-style mb-20">
                                            <label>Billing email</label>
                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" />
                                        </div>
                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-3 mb-lg-0">
                                <div class="card-header">
                                    <h3 class="mb-0">Thông tin cá nhân</h3>
                                </div>
                                <div class="card-body">
                                    <address>
                                        3522 Interstate<br />
                                        75 Business Spur,<br />
                                        Sault Ste. <br />Marie, MI 49783
                                    </address>
                                    <p>New York</p>
                                    <a href="#" class="btn-small">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Tổng lượt xem tin</h5>
                                </div>
                                <div class="card-body">
                                    <address>
                                        4299 Express Lane<br />
                                        Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                    </address>
                                    <p>Sarasota</p>
                                    <a href="#" class="btn-small">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5>Account Details</h5>
                        </div>
                        <div class="card-body">
                            <p>Already have an account? <a href="page-login.html">Log in instead!</a></p>
                            <form method="post" name="enq">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>First Name <span class="required">*</span></label>
                                        <input required="" class="form-control" name="name" type="text" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input required="" class="form-control" name="phone" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Display Name <span class="required">*</span></label>
                                        <input required="" class="form-control" name="dname" type="text" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input required="" class="form-control" name="email" type="email" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Current Password <span class="required">*</span></label>
                                        <input required="" class="form-control" name="password" type="password" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>New Password <span class="required">*</span></label>
                                        <input required="" class="form-control" name="npassword" type="password" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Confirm Password <span class="required">*</span></label>
                                        <input required="" class="form-control" name="cpassword" type="password" />
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection