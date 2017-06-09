@extends('layouts.auth')

@section('content')
<center><p>Reset your Bitcraft Core Account password.</p></center>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form class="col-md-12" role="form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email Address" required autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group addtop">
        <button name="submit" type="submit" class="btn btn-primary btn-block btn-flat btn-md">Reset Password</button>
    </div>
    <div class="form-group">
        <span><a href="/login">Remember your password? Login</a></span>
    </div>
    <p class="copyright"><br />powered by <a href='https://github.com/bitcraft-labs/' target="_blank">Bitcraft Core</a></p>
</form>
@endsection
