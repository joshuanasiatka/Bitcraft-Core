@extends('layouts.auth')

@section('content')
<center><p>Reset your Bitcraft Core Account password.</p></center>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form class="col-md-12" role="form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required>

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group addtop">
        <button name="submit" type="submit" class="btn btn-primary btn-block btn-flat btn-md">Send Password Reset Link</button>
    </div>
    <div class="form-group">
        <span><a href="/login">Remember your password? Login</a></span>
    </div>
    <p class="copyright"><br />powered by <a href='https://github.com/bitcraft-labs/' target="_blank">Bitcraft Core</a></p>
</form>
@endsection
