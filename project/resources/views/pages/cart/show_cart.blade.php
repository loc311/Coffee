@extends('welcome')
@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">

			<?php

			use Gloudemans\Shoppingcart\Facades\Cart;

			$content = Cart::content();
			?>
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Hình ảnh</td>
						<td class="description">Sản phẩm</td>
						<td class="price">Size</td>
						<td class="price">Giá</td>
						<td class="quantity">Số lượng</td>
						<td class="total">Tổng tiền</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach ($content as $v_content)
					<tr>
						<td class="cart_product">
							<a href=""><img width="100px" src="{{URL::to('upload/product/'.$v_content->options->image)}}" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href="">{{$v_content->name}}</a></h4>

						</td>
						<td class="cart_price">
							<p>{{$v_content->options->size}}</p>
						</td>
						<td class="cart_price">
							<p>{{number_format($v_content->price).' '.'VND'}}</p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button">
								<a class="cart_quantity_down" href="{{URL::to('/update2_to_cart/'.$v_content->rowId.'/'.$v_content->qty)}}"> - </a>
								<input class="cart_quantity_input" type="text" readonly name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2" min="1">
								<a class="cart_quantity_up" href="{{URL::to('/update1_to_cart/'.$v_content->rowId.'/'.$v_content->qty)}}"> + </a>

							</div>
						</td>
						<td class="cart_total">
							<p class="cart_total_price">
								<?php
								$subtotal = $v_content->price * $v_content->qty;
								echo number_format($subtotal) . ' ' . 'VND';
								?>
							</p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete" href="{{URL::to('/delete_to_cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
						</td>
					</tr>


					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<!-- <div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div> -->
		<div class="row">
			<!-- <div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							
						</ul>
						<ul class="user_info">
							
							
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div> -->
			<div class="col-sm-12">
				<div class="total_area">
					<ul>
						<li>Tổng <span>{{Cart::subtotal()}} VND</span></li>
						<li>Thuế <span>{{Cart::tax()}} VND</span></li>
						<li>Phí vận chuyển <span>Free</span></li>
						<li>Thành tiền <span>{{Cart::total()}} VND</span></li>
					</ul>
					<!-- <a class="btn btn-default update" href="">Update</a> -->
					<?php

					use Illuminate\Support\Facades\Session;

					$customer_id = Session::get('customer_id');
					if (Cart::subtotal() != 0) {
						if ($customer_id == NULL) {

					?>		
							<a class="btn btn-default check_out" href="" data-toggle="modal" data-target="#flipFlop"> Thanh toán</a>
							
						<?php
						} else {
						?>
							<a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
						<?php
						}
					} else {

						?>
						<Script>
							alert('Vui lòng chọn sản phẩm để thanh toán!!!');
						</Script>
						<a class="btn btn-default check_out" href="{{URL::to('/san_pham')}}">Thanh toán</a>
					<?php


					}

					?>
				</div>
			</div>


		</div>
</section>
<!--/#do_action-->
@endsection