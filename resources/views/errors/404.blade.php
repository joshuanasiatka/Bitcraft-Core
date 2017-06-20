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
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
		<section id="page-header" class="ph-align-center ph-large">
			<div class="container">
				<h2 id="page-header-title">Hmm... Well this is a 404 error.</h2>
				<h3 id="page-header-tagline">Now where did I put this page... <br>This may take a while, you should go back or click Home. I'll gather the code monkeys to form a search party to see if we can restore this page if it existed. It may not have existed to begin with. One of us is crazy. Probably me. Or the monkeys...<br>Going back or home is much recommended.</h3>
			</div>
		</section>

		<footer id="site-footer">
            <p class="copyright">Powered by <a href="https://github.com/joshuanasiatka/Bitcraft-Core/" target="_blank">Bitcraft Core</a></p>
        </footer>
    </div>

	<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
