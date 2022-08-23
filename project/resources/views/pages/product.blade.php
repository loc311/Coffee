@extends('welcome')
@section('content')
<section>
	<?php

	use Illuminate\Support\Facades\Session;
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Danh mục sản phẩm</h2>
					<div class="panel-group category-products" id="accordian">
						<!--category-productsr-->
						@foreach ($cate_product as $key =>$cate_product)

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{URL::to('danh_muc_san_pham/'.$cate_product->category_id)}}">{{$cate_product->category_name}}</a></h4>
							</div>
						</div>
						@endforeach

					</div>
					<!--/category-productsr-->

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items">
					<!--features_items-->
					<h2 class="title text-center">Sản phẩm</h2>
					@foreach ($all_product as $key =>$product)
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<a href="{{URL::to('chi_tiet_san_pham/'.$product->product_id)}}">
										<img src="{{URL::to('upload/product/'.$product->product_image)}}" alt="" />
										<?php
										foreach ($price as $key => $pri) {
											if ($product->product_id == $pri->product_id) {
										?>
												<h2>{{number_format($pri->product_price).' '.'VND'}}</h2>
										<?php
												break;
											}
										}

										?>
										<!-- <h2>$56</h2> -->
										<p>{{$product->product_name}}</p>
									</a>

									<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a> -->
								</div>
								<!-- <div class="product-overlay">
										<div class="overlay-content">
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div> -->
							</div>
							<div class="choose">
								<ul class="nav nav-pills nav-justified">
									<?php

									$customer_id = Session::get('customer_id');
									if ($customer_id) {
										$count = 'N';
										foreach ($wishlist as $key => $wl) {
											if ($wl->customer_id == $customer_id && $wl->product_id == $product->product_id) {
												$count = 'Y';
												break;
											}
										}
										if ($count == 'Y') {
									?>
											<li><a href="{{URL::to('/remove_wishlist/'.$customer_id.'/'.$product->product_id)}}" class="wishlist"><i class="fa fa-plus-square"></i>Bỏ thích</a></li>
										<?php
										} else {
										?>
											<li><a href="{{URL::to('/add_wishlist/'.$customer_id.'/'.$product->product_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
										<?php
										}
									} else {
										?>
										<li><a href="" onclick="return confirm('Bạn cần đăng nhập để yêu thích sản phẩm!!')"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
									<?php
									}

									?>
								</ul>
							</div>
						</div>
					</div>

					@endforeach

				</div>
				<!--features_items-->
				<div class="row">
					<div style="text-align: center;">{{ $all_product->links() }}</div>


				</div>
			</div>



		</div>
	</div>
</section>
@endsection