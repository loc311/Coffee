@extends('welcome')
@section('content')
<p style="text-align: center; font-size: 20px; color: #FE980F;">
<?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
if ($message) {
	echo $message;
	Session::put('message', null);
}
?>
</p>
<section id="form">
	<!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form">
					<!--login form-->
					<h2>Đăng nhập</h2>
					<form action="{{URL::to('/login_customer')}}" method="POST">
						{{csrf_field()}}
						<span>Số điện thoại </span><span style="color: red;">*</span><input type="text" name="phone_account" pattern="[0-9]{10}" placeholder="Số điện thoại" required />
						<span>Mật khẩu </span><span style="color: red;">*</span><input type="password" name="password_account" placeholder="Mật khẩu" required />
						<!-- <span>
								<input type="checkbox" class="checkbox"> 
								Nhớ đăng nhập
							</span> -->
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div>
				<!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">
					<>
				</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form">
					<!--sign up form-->
					<h2>Tạo tài khoản</h2>
					<form action="{{URL::to('/add_customer')}}" method="POST">
						{{csrf_field()}}
						<span>Số điện thoại </span><span style="color: red;">*</span><input type="text" name="customer_phone" placeholder="Số điện thoại" pattern="[0-9]{10}" required />
						<span>Họ và Tên </span><span style="color: red;">*</span><input type="text" name="customer_name" placeholder="Họ và Tên" required />
						<span>Mật khẩu </span><span style="color: red;" pattern="[a-zA-Z0-9]{6,}">*</span><input type="password" id="password" name="customer_password" placeholder="Mật khẩu" required />
						<span>Mật khẩu xác nhận </span><span style="color: red;">*</span><input type="password" id="confirm_password" name="password" placeholder="Xác thực mật khẩu" required />
						<button type="submit" class="btn btn-default">Tạo tài khoản</button>
					</form>
				</div>
				<!--/sign up form-->
			</div>
		</div>
	</div>
</section>
<!--/form-->

<script>
	var password = document.getElementById("password"),
		confirm_password = document.getElementById("confirm_password");

	function validatePassword() {
		if (password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Mật khẩu xác thực không trùng khớp");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
@endsection