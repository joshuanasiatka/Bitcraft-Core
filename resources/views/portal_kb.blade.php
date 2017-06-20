@extends('layouts.app_eu')

@section('content')
<section id="page-header" class="clearfix">
	<div class="container">
		<h1 id="page-header-title">Knowledge Base</h1>
		<form class="hkb-site-search" method="get" action="#">
			<label class="hkb-screen-reader-text" for="s">Search For</label>
			<input class="hkb-site-search__field" type="text" value="" placeholder="Search the Knowledge Base" name="s" autocomplete="off">
			<input type="hidden" name="ht-kb-search" value="1" />
			<input type="hidden" name="lang" value="" />
			<button class="hkb-site-search__button" type="submit"><span>Search</span></button>
		</form>
	</div>
</section>
<div id="primary" class="sidebar-right clearfix">
	<div class="container">
		<main id="content" role="main" itemscope="itemscope" itemprop="mainContentOfPage">
			<div id="hkb" class="hkb-template-archive">
				<ul class="hkb-archive hkb-archive--two-cols clearfix">
					<li>
						<div class="hkb-category" data-hkb-cat-icon="">
							<div class="hkb-category__header">
								<h2 class="hkb-category__title"><a href="/portal/kb/categories/getting-started/" title="View all posts in Getting Started">Getting Started</a> <span class="hkb-category__count">4 Articles</span></h2>
								<p class="hkb-category__description">Articles to get you up and running, quick and easy.</p>
							</div>
							<ul class="hkb-article-list">
								<li class="hkb-article-list__format-standard"> <a href="/portal/kb/1/">Preparing your server for installation</a></li>
								<li class="hkb-article-list__format-standard"> <a href="/portal/kb/1/">Choosing the right billing plan</a></li>
								<li class="hkb-article-list__format-standard"> <a href="/portal/kb/1/">Creating a multilingual site</a></li>
								<li class="hkb-article-list__format-standard"> <a href="/portal/kb/1/">How do I contact Customer Care?</a></li>
							</ul><a class="hkb-category__view-all" href="/portal/kb/categories/getting-started/">View all</a></div>
					</li>
					<li>
						<div class="hkb-category" data-hkb-cat-icon="">
							<div class="hkb-category__header">
								<h2 class="hkb-category__title"><a href="#" title="View all posts in Troubleshooting">Troubleshooting</a> <span class="hkb-category__count">4 Articles</span></h2>
								<p class="hkb-category__description">For when things go wrong don't fret! We're here to help.</p>
							</div>
							<ul class="hkb-article-list">
								<li class="hkb-article-list__format-standard"> <a href="#">Can I attach files to forms?</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Activating advanced settings in admin panel</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Install error 801 – solution</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Common server compatibility fixes</a></li>
							</ul><a class="hkb-category__view-all" href="#">View all</a></div>
					</li>
					<li>
						<div class="hkb-category" data-hkb-cat-icon="">
							<div class="hkb-category__header">
								<h2 class="hkb-category__title"><a href="#" title="View all posts in Account Management">Account Management</a> <span class="hkb-category__count">7 Articles</span></h2>
								<p class="hkb-category__description">How to manage your account and it's features.</p>
							</div>
							<ul class="hkb-article-list">
								<li class="hkb-article-list__format-standard"> <a href="#">Reset your password</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Change your privacy settings</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Profile Settings</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Reactivate or deactivate an account</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">How Do I Change My Username?</a></li>
							</ul><a class="hkb-category__view-all" href="#">View all</a></div>
					</li>
					<li>
						<div class="hkb-category" data-hkb-cat-icon="">
							<div class="hkb-category__header">
								<h2 class="hkb-category__title"><a href="#" title="View all posts in Integrations &amp; API">Integrations &amp; API</a> <span class="hkb-category__count">5 Articles</span></h2>
								<p class="hkb-category__description">Developer documentation and integration features.</p>
							</div>
							<ul class="hkb-article-list">
								<li class="hkb-article-list__format-standard"> <a href="#">Why Was My Developer Application Rejected?</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">How Do I Get An API Key?</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">What Are The API Limits?</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Where do I find my secret token?</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Writing extensions guide</a></li>
							</ul><a class="hkb-category__view-all" href="#">View all</a></div>
					</li>
					<li>
						<div class="hkb-category" data-hkb-cat-icon="">
							<div class="hkb-category__header">
								<h2 class="hkb-category__title"><a href="#" title="View all posts in Legal and privacy">Legal and privacy</a> <span class="hkb-category__count">7 Articles</span></h2>
								<p class="hkb-category__description">Important information about how we handle your privacy and data.</p>
							</div>
							<ul class="hkb-article-list">
								<li class="hkb-article-list__format-standard"> <a href="#">Personalization and data</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Third party analytics</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Privacy Policy</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Mobile App Permissions</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">DMCA Notice Procedure</a></li>
							</ul><a class="hkb-category__view-all" href="#">View all</a></div>
					</li>
					<li>
						<div class="hkb-category" data-hkb-cat-icon="1">
							<div class="hkb-category__header">
								<h2 class="hkb-category__title"><a href="#" title="View all posts in Labs Features">Labs Features</a> <span class="hkb-category__count">6 Articles</span></h2>
								<p class="hkb-category__description">This category has a custom icon and subcategories.</p>
							</div>
							<ul class="hkb-subcats">
								<li class="hkb-subcats__cat"> <a class="hkb-subcats__cat-title" href="#" title="View all posts in Labs Tools">Labs Tools</a> <span class="hkb-subcats__cat-count">3 Articles</span></li>
							</ul>
							<ul class="hkb-article-list">
								<li class="hkb-article-list__format-standard"> <a href="#">How to enable labs features</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">New article attachents</a></li>
								<li class="hkb-article-list__format-standard"> <a href="#">Custom keyboard shortcuts</a></li>
							</ul><a class="hkb-category__view-all" href="#">View all</a></div>
					</li>
				</ul>
			</div>
		</main>
		<aside id="sidebar">
			<section id="ht-kb-articles-widget-2" class="widget hkb_widget_articles clearfix">
				<h4 class="widget-title">Popular Articles</h4>
				<ul>
					<li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Preparing your server for installation</a>
						<ul class="hkb-meta">
							<li class="hkb-meta__usefulness hkb-meta__usefulness--good"> 634</li>
							<li class="hkb-meta__comments"> 1</li>
						</ul>
					</li>
					<li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Can I attach files to forms?</a>
						<ul class="hkb-meta">
							<li class="hkb-meta__usefulness hkb-meta__usefulness--good"> 232</li>
						</ul>
					</li>
					<li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">How do I contact Customer Care?</a>
						<ul class="hkb-meta">
							<li class="hkb-meta__usefulness hkb-meta__usefulness--good"> 59</li>
						</ul>
					</li>
					<li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">How to enable labs features</a>
						<ul class="hkb-meta">
							<li class="hkb-meta__usefulness hkb-meta__usefulness--good"> 92</li>
						</ul>
					</li>
					<li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Why Was My Developer Application Rejected?</a>
						<ul class="hkb-meta">
							<li class="hkb-meta__usefulness hkb-meta__usefulness--good"> 51</li>
						</ul>
					</li>
				</ul>
			</section>
		</aside>
	</div>
</div>
@endsection
