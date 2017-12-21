@extends('master')

@section('content')


<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">{{ $loai_sp->name }}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{ route('trangchu') }}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($loai as $L)
							<li><a href="{{ route('loaisanpham',$L->id) }}">{{ $L->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>New Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm Thấy {{ count($sp_theoloai) }} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-4">
									<div class="single-item">
										@if($sp->promotion_price != 0)
										<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{ $sp->image }}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $sp->name }}</p>
											<p class="single-item-price">
												@if($sp->promotion_price != 0)
												<span class="flash-del">{{ number_format($sp->unit_price) }} VNĐ</span>
												<span class="flash-sale">{{ number_format($sp->promotion_price) }} VNĐ</span>
												@else
												<span class="flash-del">{{ number_format($sp->unit_price) }} VNĐ</span>
												@endif

											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{  route('chitietsanpham',$sp->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản Phẩm Khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{ count($sanpham_khac) }} Sản Phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanpham_khac as $sp_khac)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="source/image/product/{{ $sp_khac->image }}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{ $sp_khac->name }}</p>
											<p class="single-item-price">
												@if($sp->promotion_price != 0)
												<span class="flash-del">{{ number_format($sp_khac->unit_price) }} VNĐ</span>
												<span class="flash-sale">{{ number_format($sp_khac->promotion_price) }} VNĐ</span>
												@else
												<span class="flash-del">{{ number_format($sp_khac->unit_price) }} VNĐ</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{ route('chitietsanpham',$sp_khac->id) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
							<div class="row"> {{ $sanpham_khac->links() }} </div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	@endsection