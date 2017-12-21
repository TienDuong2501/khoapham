@extends('master')


@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>

			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{ route('register') }}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token"  value="{{ csrf_field() }}">
				 
				<div class="row">
					<div class="col-sm-3"></div>
					@if(count($errors) > 0)
						
							<div class="alert alert-danger">
								@foreach($errors->all() as $err)
									{{ $err }}<br>
								@endforeach
							</div>
					@endif

					@if(Session::has('thongbao'))
						<div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
					@endif
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email"  >
						</div>

						<div class="form-block">
							<label for="fullname">Fullname*</label>
							<input type="text" name="fullname"  >
						</div>

						<div class="form-block">
							<label for="address">Address*</label>
							<input type="text" name="address"   >
						</div>


						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" >
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" name="password" >
						</div>
						<div class="form-block">
							<label for="re_password">Re password*</label>
							<input type="password" name="re_password"  >
						</div>
						<div class="form-block">
							<button type="submit" name="btn" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection