@extends('layouts.auth')

@section('content')
<center><p>Login to your Bitcraft Core Account.</p></center>
<form class="col-md-12" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
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
    <div class="checkbox icheck">
        <label class="checkbox icheck">
        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
    </div>
    <div class="form-group addtop">
        <button name="submit" type="submit" class="btn btn-primary btn-block btn-flat btn-md">Sign In</button>
    </div>
    <div class="form-group">
        <span><a href="/password/reset">Forgot Password?</a></span><br>
        <span><a href="/register">Don't have an account? Register</a></span>
    </div>
    <p class="copyright"><br />powered by <a href='https://github.com/bitcraft-labs/' target="_blank">Bitcraft Core</a></p>
</form>
@endsection
