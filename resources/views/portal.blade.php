@extends('layouts.app_eu')

<?php
// TODO: Integrate Toggles with DB based on modules subscribed/enabled
$kbEnabled = true;
$requestsEnabled = true;
$announcementsEnabled = false;
$quickLinksEnabled = true;
?>

@section('content')
<section id="page-header" class="ph-align-center ph-large">
	<div class="container">
		<h2 id="page-header-title">{{ config('app.name', 'Bitcraft Core Framework') }}</h2>
		<h3 id="page-header-tagline">A modular framework designed on Laravel</h3>
		@if ($kbEnabled)
			<form class="hkb-site-search" method="get" action="#">
				<input class="hkb-site-search__field" type="text" value="" placeholder="Search the Knowledge Base" name="s" autocomplete="off">
				<input type="hidden" name="ht-kb-search" value="1" />
				<input type="hidden" name="lang" value="" />
				<button class="hkb-site-search__button" type="submit"><span>Search</span></button>
			</form>
		@endif
	</div>
</section>
@if (!($kbEnabled or $requestsEnabled or $announcementsEnabled))
<section id="homepage-features" class="clearfix">
	<div class="container">
		<p class="center alert">Error: No modules installed/enabled or missing access role.</p>
	</div>
</section>
@else
<section id="homepage-features" class="clearfix">
	<div class="container">
		<div class="ht-grid ht-grid-gutter-20 portal-grid">
			@if ($kbEnabled)
				<div class="<?php if (!($requestsEnabled && $announcementsEnabled)) echo 'col-md-6'; else echo 'col-md-4'; ?>">
					<a href="/portal/knowledge-base">
						<div class="hf-block hf-kb-block"> <i class="fa fa-lightbulb-o"></i>
							<h4>Knowledge Base</h4>
							<h5>33 Articles  /  7 Categories</h5></div>
					</a>
				</div>
			@endif
			@if ($requestsEnabled)
				<div class="<?php if (!($kbEnabled && $announcementsEnabled)) echo 'col-md-6'; else echo 'col-md-4'; ?>">
					<a href="/portal/requests">
						<div class="hf-block hf-forum-block"> <i class="fa fa-comment-o"></i>
							<h4>Requests</h4>
							<h5>1 Open  /  13 Closed</h5></div>
					</a>
				</div>
			@endif
			@if ($announcementsEnabled)
				<div class="<?php if (!($kbEnabled && $requestsEnabled)) echo 'col-md-6'; else echo 'col-md-4'; ?>">
					<a href="/portal/announcements">
						<div class="hf-block hf-posts-block"> <i class="fa fa-bullhorn"></i>
							<h4>Announcements</h4>
							<h5>11 Posts  /  3 Categories</h5></div>
					</a>
				</div>
			@endif
		</div>
	</div>
</section>
@endif
@if (($kbEnabled or $quickLinksEnabled))
<section id="homepage-widgets" class="">
	<div class="container">
		<div class="ht-grid ht-grid-gutter-20 ht-grid-gutter-bottom-40">
			@if ($kbEnabled)
				<section id="ht-kb-articles-widget-3" class="widget hkb_widget_articles ht-grid-col ht-grid-4">
					<h4 class="widget-title">Popular Articles</h4>
					<ul>
						<li><a href="#">Accessing archived emails</a></li>
						<li><a href="#">How to update an email signature</a></li>
						<li><a href="#">Setting an out-of-office notification</a></li>
						<li><a href="#">Changing your voicemail pin</a></li>
						<li><a href="#">Modifying your alternate voicemail greeting</a></li>
						<li><a href="#">Changing your password</a></li>
					</ul>
				</section>
				<section id="ht-kb-articles-widget-4" class="widget hkb_widget_articles ht-grid-col ht-grid-4">
					<h4 class="widget-title">Most Helpful Articles</h4>
					<ul>
						<li><a href="#">Granting rights to an encrypted email package</a></li>
						<li><a href="#">How to access my voicemail from out of the office</a></li>
						<li><a href="#">Accessing archived emails</a></li>
						<li><a href="#">How to update an email signature</a></li>
						<li><a href="#">Setting an out-of-office notification</a></li>
					</ul>
				</section>
			@endif
			@if ($quickLinksEnabled)
				<section id="bbp_topics_widget-3" class="widget widget_display_topics ht-grid-col ht-grid-4">
					<h4 class="widget-title">Quick Links</h4>
					<ul>
						<li><a href="https://google.com">Google</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
						<li><a href="#">Lorem ipsum dolor sit amet</a></li>
					</ul>
				</section>
			@endif
		</div>
	</div>
</section>
@endif
@endsection
