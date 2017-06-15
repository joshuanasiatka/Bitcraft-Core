<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bitcraft Core Framework') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body class="dark alt">
    <div class="login">
      <div class="login-area">
          <div class="login-header">
              <img src="/img/bcl_logo.png" width="60%" />
              <h1><i class="fa fa-sign-in"></i> <strong>Bitcraft Core</strong></h1>
          </div>
          @yield('content')
          <p class="copyright"><br />powered by <a href='https://github.com/bitcraft-labs/' target="_blank">Bitcraft Core</a></p>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
