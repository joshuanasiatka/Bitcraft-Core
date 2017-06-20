<?php
// TODO: Integrate Toggles with DB based on modules subscribed/enabled
$kbEnabled = true;
$requestsEnabled = true;
$announcementsEnabled = false;
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bitcraft Core Framework') }}</title>

	{{-- Google Fonts --}}
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700%7CNunito:400" />

	{{-- Font-Awesome --}}
    <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" integrity="sha384-dNpIIXE8U05kAbPhy3G1cz+yZmTzA6CY8Vg/u2L9xRnHjJiAK76m2BIEaSEV+/aU" crossorigin="anonymous">

	{{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('css/portal.css') }}" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('css/portal.custom.css') }}" type="text/css"/>
	<link rel="stylesheet" href="{{ asset('css/portal.kb.css') }}" type="text/css"/>
</head>

<body>
    <div id="app">
        <header id="site-header">
            <div class="container clearfix">
				<h2 class="site-title"><a title="{{ config('app.name', 'Bitcraft Core Framework') }}" href="/"><i class="fa fa-cogs"> </i> Service Desk</a></h2>
                <nav id="nav-primary">
                    <button id="nav-toggle"><span>Menu</span></button>
					<div id="nav-primary-menu" class="menu-primary-nav-container">
                        <ul id="menu-primary-nav" class="">
                            <li><a href="/portal">Home</a></li>
							@if ($kbEnabled)
								<li><a href="/portal/knowledge-base">Knowledgebase</a></li>
							@endif
							@if ($requestsEnabled)
								<li><a href="#">Requests</a></li>
							@endif
							@if ($announcementsEnabled)
								<li><a href="#">Announcements</a></li>
							@endif
							<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
									@if (((\Request::is('portal')) or (\Request::is('portal/*'))) and (Auth::user()->isAdmin))
                                        <li><a href="/dashboard"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                                    @endif
									<Li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

		@yield('content')

		<footer id="site-footer">
            <p class="copyright">Powered by <a href="https://github.com/joshuanasiatka/Bitcraft-Core/" target="_blank">Bitcraft Core</a></p>
        </footer>
    </div>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
