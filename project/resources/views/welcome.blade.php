<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cup Coffee</title>
	<link href="{{asset('fontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/prettyPhoto.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/price-range.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('fontend/css/responsive.css')}}" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
	<header id="header">
		<!--header-->
		<div class="header_top">
			<!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> 0969999999</a></li>
								<li><a href="mailto:cupcoffee@gmail.com"><i class="fa fa-envelope"></i> cupcoffee.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header_top-->

		<div class="header-middle">
			<!--header-middle-->
			<div class="container">
				<div class="row" style="padding: 0;">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trang_chu')}}"><img src="{{('/image/logo.png')}}" style="width: 30%;" /></a>
						</div>
						<div class="btn-group pull-right">
							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VN
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">VN</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div> -->

							<!-- <div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">VND</a></li>
									<li><a href="#">Dollar</a></li>
								</ul>
							</div> -->
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<!-- <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li> -->
								<li><a href="{{URL::to('/wishlist')}}"><i class="fa fa-star"></i> Yêu thích 

								<?php
								use Illuminate\Support\Facades\Session;
								use Illuminate\Support\Facades\DB;
								$customer_id = Session::get('customer_id');
								$sum = DB::table('tbl_wishlist')->where('customer_id',$customer_id)->get()->count();
        						
									if ($sum != NULL) {
										echo '<span style="border: 1px solid red;border-radius: 25px; font-size: 80%; color: white; background-color: red; margin-bottom: 20px; padding: 1px;">'.$sum.'</span>';

									}
								?>
								</a></li>
								<!-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> -->
								<li><a href="{{URL::to('/show_cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng
								<?php
								use Gloudemans\Shoppingcart\Facades\Cart;

									$cart = Cart::content()->count();
									if ($cart != NULL) {
										echo '<span style="border: 1px solid red;border-radius: 25px; font-size: 80%; color: white; background-color: red; margin-bottom: 20px; padding: 1px;">'.$cart.'</span>';

									}
								?>
							</a></li>

								<?php

								
								if ($customer_id == NULL) {
								?>
									<li><a href="" data-toggle="modal" data-target="#flipFlop"><i class="fa fa-lock"></i> Đăng nhập</a></li>

									
								<?php
								} else {
								?>
									<!-- <li><a href="{{URL::to('/logout_checkout')}}"><i class="fa fa-unlock"></i> Đăng xuất</a></li> -->
									<li class="dropdown">
										<a data-toggle="dropdown" class="dropdown-toggle" href="#">

											<span class="username">
												<?php
												$name = Session::get('customer_name');
												if ($name) {
													echo "&nbsp " . $name;
												}
												?>

											</span>
											<b class="caret"></b>
										</a>
										<ul class="dropdown-menu extended logout">
											<li><a href="{{URL::to('/order_manage')}}"><i class=" fa fa-suitcase"></i> Đơn hàng</a></li>
											<li><a href="{{URL::to('/password_customer')}}"><i class="fa fa-cog"></i> Tài khoản</a></li>
											<li><a href="{{URL::to('/logout_checkout')}}"><i class="fa fa-key"></i> Đăng xuất</a></li>
										</ul>
									</li>
								<?php
								}

								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/header-middle-->

		<div class="header-bottom">
			<!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang_chu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="{{URL::to('/san_pham')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										@foreach ($cate as $key =>$cate)
										<li style="text-transform: capitalize;"><a href="{{URL::to('danh_muc_san_pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
										@endforeach
									</ul>
								</li>
								<!-- <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>  -->
								<li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
								<li><a href="{{URL::to('/about')}}">Về chúng tôi</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<form action="{{URL::to('tim_kiem')}}" method="POST">
							{{csrf_field()}}
							<div class="search_box pull-right">
								<input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm" />
								<!-- <input type="submit" class="fa fa-search" value="Tìm"> -->
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<!--/header-bottom-->
	</header>
	<!--/header-->

	<section id="slider">
		<!--slider-->
		<div class="container">
			<div class="row">
				<div>
					<p style="text-align: center; font-size: 20px; color: #FE980F;">
						<?php



						$message = Session::get('message');
						if ($message) {
							echo $message;
							Session::put('message', null);
						}
						?>
					</p>
				</div>
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active carousel-caption">
								<!-- <div class="col-sm-6">
									<h1><span>C</span>à phê</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Xem ngay</button>
								</div> -->
								<div class="col-sm-12 carousel-item">
									<img src="{{('/image/silde.png')}}" class="girl img-responsive" alt="" />

								</div>
							</div>
							<div class="item">
								<!-- <div class="carousel-caption">
									<h1><span>E</span>-Freeze</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Xem ngay</button>
								</div> -->
								<div class="col-sm-12 carousel-item">
									<img src="{{('/image/silde1.png')}}" class="girl img-responsive" alt="" />
									<!-- <img src="{{('image/silde.png')}}"  class="pricing" alt="" /> -->
								</div>
							</div>

							<div class="item">
								<!-- <div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div> -->
								<div class="col-sm-12 carousel-item">
									<img src="{{('/image/silde2.png')}}" class="girl img-responsive" alt="" />

								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--/slider-->

	<section>
		<div class="container">
			<div class="row">


				<div class="col-sm-12 padding-right">
					@yield('content')




				</div>
			</div>
		</div>
	</section>

	<footer id="footer">
		<!--Footer-->


		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>CUP COFFEE</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">590 Cách Mạng Tháng 8</a></li>
								<li><a href="#">0999999999</a></li>
								<li><a href="#">cupcoffee.com</a></li>
								<!-- <li><a href="#">Change Location</a></li>
								<li><a href="#">FAQ’s</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Thời gian hoạt động</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">24/7</a></li>
								<!-- <li><a href="#">Mens</a></li>
								<li><a href="#">Womens</a></li>
								<li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Tuyển dụng</a></li>
								<li><a href="#">Sản phẩm</a></li>
								<li><a href="#">Về chúng tôi</a></li>
								<!-- <li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li> -->
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div> -->
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Kết nối</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Địa chỉ mail" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<!-- <p>Get the most recent updates from <br />our site and be updated your self...</p> -->
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2022 Cup Coffee Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="">CUP COFFEE</a></span></p>
				</div>
			</div>
		</div>

	</footer>
	<!--/Footer-->

	<!-- modal -->
	<div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 style="text-align: center;" class="modal-title" id="modalLabel">Tài khoản</h4>

				</div>
				<div class="modal-body">

					<section id="form">
						<!--form-->

						<div class="">
							<div class="col-sm-5">
								<div class="login-form">
									<!--login form-->
									<h2>Đăng nhập</h2>
									<form action="{{URL::to('/login_customer')}}" method="POST">
										{{csrf_field()}}
										<span>Số điện thoại </span><span style="color: red;">*</span><input type="text" name="phone_account" pattern="[0-9]{10}" placeholder="Số điện thoại" required />
										<span>Mật khẩu </span><span style="color: red;">*</span><input type="password" name="password_account" placeholder="Mật khẩu" required />

										<button type="submit" class="btn btn-default">Đăng nhập</button>
									</form>
								</div>
								<!--/login form-->
							</div>
							<div class="col-sm-2">
								<h2 class="or">
									<>
								</h2>
							</div>
							<div class="col-sm-5">
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
								<!--/sign up form-->
							</div>
						</div>

					</section>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			</div>
		</div>
	</div>
	</div>



	<script src="{{asset('fontend/js/jquery.js')}}"></script>
	<script src="{{asset('fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('fontend/js/price-range.js')}}"></script>
	<script src="{{asset('fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('fontend/js/main.js')}}"></script>

</body>

</html>