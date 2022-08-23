@extends('welcome')
@section('content')
<section>
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
				@foreach ($product_detail as $key => $value)
				<div class="product-details">
					<!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">
							<img src="{{URL::to('upload/product/'.$value->product_image)}}" alt="" />
							<!-- <h3>ZOOM</h3> -->
						</div>


					</div>
					<div class="col-sm-7">
						<div class="product-information">
							<!--/product-information-->

							<h2>{{$value->product_name}}</h2>
							<p>ID:{{$value->product_id}}</p>
							<!-- <img src="images/product-details/rating.png" alt="" /> -->

							<form action="{{URL::to('/save_cart')}}" method="post">
								{{ csrf_field()}}
								<span>
									<div class="col-sm-12">
									<span id="show_message"></span>
									</div>
									

									<br>
									<label>Size:</label>

									<select name="product_size" class="form-control input-sm m-bot15" id="size" onchange="pro_size(this)" required>
										<option value="" disabled selected>Chọn size</option>
										@foreach ($size as $key =>$size)
										<option value="{{$size->product_size}}">{{$size->product_size}}</option>
										@endforeach
									</select>

									<script language="javascript">
										// Hàm xử lý khi thẻ select thay đổi giá trị được chọn
										// obj là tham số truyền vào và cũng chính là thẻ select
										function pro_size(obj) {
											var message = document.getElementById('show_message');
											var value = obj.value;
											<?php foreach ($size2 as $key => $size2) {
											?>
												if (value == '<?php echo $size2->product_size ?>') {
													message.innerHTML = "<?php echo number_format($size2->product_price) . ' ' . 'VND' ?>";

												}
												if (value == 0) {
													message.innerHTML = " ";
												}
											<?php
											}

											?>
										}
									</script>

									<br>
									<label>Số lượng:</label>
									<input name="product_id_hidden" type="hidden" value="{{$value->product_id}}" />

									<input name="qty" type="number" min="1" value="1" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm giỏ hàng
									</button>

								</span>

							</form>

							<p><b>Tình trạng:</b> Còn hàng</p>

							<p><b>Danh mục:</b> {{$value->category_name}}</p>
							<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
						</div>
						<!--/product-information-->
					</div>
				</div>
				<!--/product-details-->

				<div class="category-tab shop-details-tab">
					<!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#details" data-toggle="tab">Chi tiết</a></li>
							<!-- <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li> -->
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="details">
							<p>{!!$value->product_desc!!}</p>

						</div>


						<!-- <div class="tab-pane fade " id="reviews">
							<div class="col-sm-12">
								Ratings


							</div>
						</div> -->

					</div>
				</div>
				<!--/category-tab-->
				@endforeach

				<div class="recommended_items">
					<!--recommended_items-->
					<h2 class="title text-center">Sản phẩm cùng danh mục</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">

							@foreach($relate as $key =>$rele)
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<a href="{{URL::to('chi_tiet_san_pham/'.$rele->product_id)}}">
												<img src="{{URL::to('upload/product/'.$rele->product_image)}}" alt="" />

												<?php
												foreach ($price as $key => $pri) {
													if ($rele->product_id == $pri->product_id) {
												?>
														<h2>{{number_format($pri->product_price).' '.'VND'}}</h2>
												<?php
														break;
													}
												}

												?>
												<!-- <h2>$56</h2> -->
												<p>{{$rele->product_name}}</p>
											</a>

											<!-- <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button> -->
										</div>
									</div>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<?php

											$customer_id = Session::get('customer_id');
											if ($customer_id) {
												$count = 'N';
												foreach ($wishlist as $key => $wl) {
													if ($wl->customer_id == $customer_id && $wl->product_id == $rele->product_id) {
														$count = 'Y';
														break;
													}
												}
												if ($count == 'Y') {
											?>
													<li><a href="{{URL::to('/remove_wishlist/'.$customer_id.'/'.$rele->product_id)}}" class="wishlist"><i class="fa fa-plus-square"></i>Bỏ thích</a></li>
												<?php
												} else {
												?>
													<li><a href="{{URL::to('/add_wishlist/'.$customer_id.'/'.$rele->product_id)}}"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
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
						<!-- <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a> -->
					</div>
				</div>
				<!--/recommended_items-->
			</div>
		</div>
	</div>
</section>
@endsection