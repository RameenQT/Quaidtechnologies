@extends('layouts.auth')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <img src="/frontend/images/qt-logo1.png"/>
    </div>

    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        <i class="fa fa-btn fa-sign-in"></i> Sign In
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <br>
        <!-- <a href="{{ route('password.request') }}">I forgot my password</a><br>-->

    </div>
    <!-- /.login-box-body -->
</div>
@endsection
