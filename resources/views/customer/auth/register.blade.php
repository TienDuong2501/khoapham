@extends('master')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
            
            <form action="{{ url('/customer/register') }}" method="post" class="beta-form-checkout">
                 <input type="hidden" name="token" value="{{ csrf_field() }}">
                 {{ csrf_field() }}
                <div class="row">
                    <div class="col-sm-3"></div>
                    @if(count($errors) > 0)
                        
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br>
                                @endforeach
                            </div>
                    @endif

                   {{--  @if(Session::has('thongbao'))
                        <div class="alert alert-success">{{ Session::get('thanhcong') }}</div>
                    @endif --}}
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>

                        
                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email" >
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Fullname*</label>
                            <input type="text" id="your_last_name" name="name" >
                        </div>

                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" id="adress" name="address"  >
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" name="phone" >
                        </div>
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="password" id="phone" name="password" >
                        </div>
                        {{-- <div class="form-block">
                            <label for="phone">Re password*</label>
                            <input type="password" id="phone" name="re_password" >
                        </div> --}}
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
