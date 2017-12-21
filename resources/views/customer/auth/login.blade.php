@extends('master')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/customer/password/reset') }}">
                                    Forgot Your Password?
                                </a>
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
                <h6 class="inner-title">Đăng nhập</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="index.html">Home</a> / <span>Đăng nhập</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="container">
        <div id="content">
            
            <form action="{{ route('login') }}" method="post" class="beta-form-checkout">
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
                    
                    @if(Session::has('flag'))
                    <div class="alert alert-{{ Session::get('flag') }}"> {{ Session::get('message') }} </div>
                    @endif
                    <div class="col-sm-6">
                        <h4>Đăng nhập</h4>
                        <div class="space20">&nbsp;</div>

                        
                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="password" id="phone" name="password" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> 

@endsection
