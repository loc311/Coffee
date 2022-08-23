@extends('welcome')
@section('content')

<section id="form">
	<!--form-->
	<div class="container">
		<div class="row">	
			<div class="col-sm-12">
				<div class="signup-form">
					<!--sign up form-->
					<h2>Tài khoản</h2>
					<form action="{{URL::to('customer')}}" method="POST">
						{{csrf_field()}}
						<span>Mật khẩu cũ </span><span style="color: red;" pattern="[a-zA-Z0-9]{6,}">*</span><input type="password" name="customer" placeholder="Mật khẩu cũ" required />
						<span>Mật khẩu mới </span><span style="color: red;" pattern="[a-zA-Z0-9]{6,}">*</span><input type="password" id="password" name="customer_password" placeholder="Mật khẩu mới" required />
						<span>Mật khẩu xác nhận </span><span style="color: red;">*</span><input type="password" id="confirm_password" name="password" placeholder="Xác thực mật khẩu" required />
						<button type="submit" class="btn btn-default">Xác nhận</button>
					</form>
                    <br> <br>
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