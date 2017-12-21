@extends('master')


@section('content')

<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm Kiếm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{ count($product)  }} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($product as $new)
								<div class="col-sm-3">
									<div class="single-item">
										@if($new->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source//image/product/{{$new->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new->name}}</p>
											<p class="single-item-price">
												@if($new->promotion_price == 0)
												<span class="flash-sale">{{number_format($new->unit_price)  }} VNĐ</span>
												@else
												<span class="flash-del">{{number_format($new->unit_price)  }} VNĐ</span>
												<span class="flash-sale">{{ number_format($new->promotion_price) }} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$new->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitietsanpham',$new->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>

								@endforeach

								
							</div>
							{{-- <div class="row">{{ $New_product->links() }}</div> --}}
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						{{-- <div class="beta-products-list">
							<h4>Sản Phẩm Khuyến Mại</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{ count($sanpham_khuyenmai) }} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanpham_khuyenmai as $khuyenmai)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source//image/product/{{$khuyenmai->image}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $khuyenmai->name  }}</p>
											<p class="single-item-price">
												<span class="flash-del">{{ number_format($khuyenmai->unit_price)  }} VNĐ</span>
												<span class="flash-sale">{{ number_format($khuyenmai->promotion_price)  }} VNĐ</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitietsanpham',$khuyenmai->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<div class="row">{{ $sanpham_khuyenmai->links() }}</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/1.jpg" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/2.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span class="flash-del">$34.55</span>
												<span class="flash-sale">$33.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/3.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/assets/dest/images/products/3.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{ route('themgiohang',$new->id) }}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="">Chi Tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- .beta-products-list --> --}}
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->

@endsection