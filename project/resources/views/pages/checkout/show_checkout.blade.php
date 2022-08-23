@extends('welcome')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
		<!--/breadcrums-->




		<!-- <div class="register-req">
			<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
		</div> -->
		<!--/register-req-->

		<div class="shopper-informations">
		<h2>Thông tin đơn hàng</h2>

		<form action="{{URL::to('/save_order')}}" method="POST">
			{{csrf_field()}}
			<div class="row">
				<!-- <div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form>
								<input type="text" placeholder="Display Name">
								<input type="text" placeholder="User Name">
								<input type="password" placeholder="Password">
								<input type="password" placeholder="Confirm password">
							</form>
							<a class="btn btn-primary" href="">Get Quotes</a>
							<a class="btn btn-primary" href="">Continue</a>
						</div>
					</div> -->
				<div class="col-sm-4">
					<div class="order-message">
													
								<p>Tên khách hàng</p>
								<input type="text" readonly value="<?php

									use Illuminate\Support\Facades\Session;

									$name =  Session::get('customer_name');

									echo $name;

									?>">
								<p>Số điện thoại</p>
								<input type="text" readonly value="<?php

									$phone = Session::get('customer_phone');

									echo $phone;

									?>">
															
						
					</div>
				</div>
				<div class="col-sm-4">
						<div class="order-message">
								<span>Địa chỉ giao hàng </span> <span style="color: red;">*</span>
								<input type="text" name="order_address" placeholder="Địa chỉ giao hàng" required>
								<p>Ghi chú</p>
								<textarea name="order_note" placeholder="Ghi chú đơn hàng của bạn" rows="8"></textarea>
						</div>	
					</div>
				<div class="col-sm-4">
					<div class="payment-options">
						<br>
						<!-- <span>
							<label><input type="checkbox"> Thanh toán bằng thẻ</label>
						</span>
						<br> -->
						<span>
							<label><input type="checkbox"> Thanh toán khi nhận hàng</label>
						</span>
						<br>
						
					</div>
				</div>
			</div>
			<?php
				
					$customer_id = Session::get('customer_id');
					if (Cart::subtotal() != 0) {
						if ($customer_id == NULL) {

					?>
							<a class="btn btn-default check_out" href="" data-toggle="modal" data-target="#flipFlop"> Xác nhận</a>

						<?php
						} else {
						?>
							<input type="submit" value="Xác nhận" class="btn btn-primary">
						<?php
						}
					} else {

						?>
						<Script>
							alert('Vui lòng chọn sản phẩm để thanh toán!!!');
						</Script>
						<a class="btn btn-default check_out" href="{{URL::to('/san_pham')}}">Xác nhận</a>
					<?php


					}

					?>
			

			</form>
		</div>
		<!-- <div class="review-payment">
			<h2>Xem lại giở hàng</h2>
		</div>


		<div class="payment-options">
			<span>
				<label><input type="checkbox"> Direct Bank Transfer</label>
			</span>
			<span>
				<label><input type="checkbox"> Check Payment</label>
			</span>
			<span>
				<label><input type="checkbox"> Paypal</label>
			</span>
		</div> -->
	</div>
</section>
<!--/#cart_items-->

@endsection