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
<section id="page-header-breadcrumbs" class="clearfix">
    <div class="container">
        <ol class="hkb-breadcrumbs">
            <li itemprop="itemListElement">
                <a itemprop="item" href="/" title="Home"> <span itemprop="name">Home</span> </a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement">
                <a itemprop="item" href="/portal/knowledge-base/" title="Knowledge Base"> <span itemprop="name">Knowledge Base</span> </a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement">
                <a itemprop="item" href="#" title="View all posts in Troubleshooting"> <span itemprop="name">Getting Started</span> </a>
                <meta itemprop="position" content="3" />
            </li>
        </ol>
    </div>
</section>
<div id="primary" class="sidebar-right clearfix">
    <div class="container">
		<main id="content">
		    <div id="hkb" class="hkb-template-category">
		        <div class="hkb-category" data-hkb-cat-icon="">
		            <div class="hkb-category__header">
		                <h2 class="hkb-category__title"> Getting Started</h2> <span class="hkb-category__count">4 Articles</span>
		                <p class="hkb-category__description">Articles to get you up and running, quick and easy.</p>
		            </div>
		            <article id="post-277" class="hkb-article hkb-article__format-standard">
		                <h3 class="hkb-article__title" itemprop="headline"> <a href="/portal/kb/1" rel="bookmark">Preparing your server for installation</a></h3>
		                <ul class="hkb-meta">
		                    <li class="hkb-meta__usefulness hkb-meta__usefulness--good">636</li>
		                    <li class="hkb-meta__views"> 4676</li>
		                    <li class="hkb-meta__comments"> <span class="ht-kb-comments-count" title="1 article comment"> 1 </span></li>
		                </ul>
		            </article>
		            <article id="post-293" class="hkb-article hkb-article__format-standard">
		                <h3 class="hkb-article__title" itemprop="headline"> <a href="/portal/kb/1" rel="bookmark">Choosing the right billing plan</a></h3>
		                <ul class="hkb-meta">
		                    <li class="hkb-meta__usefulness hkb-meta__usefulness--good">47</li>
		                    <li class="hkb-meta__views"> 1232</li>
		                </ul>
		            </article>
		            <article id="post-294" class="hkb-article hkb-article__format-standard">
		                <h3 class="hkb-article__title" itemprop="headline"> <a href="/portal/kb/1" rel="bookmark">Creating a multilingual site</a></h3>
		                <ul class="hkb-meta">
		                    <li class="hkb-meta__usefulness hkb-meta__usefulness--good">38</li>
		                    <li class="hkb-meta__views"> 1100</li>
		                </ul>
		            </article>
		            <article id="post-295" class="hkb-article hkb-article__format-standard">
		                <h3 class="hkb-article__title" itemprop="headline"> <a href="/portal/kb/1" rel="bookmark">How do I contact Customer Care?</a></h3>
		                <ul class="hkb-meta">
		                    <li class="hkb-meta__usefulness hkb-meta__usefulness--good">59</li>
		                    <li class="hkb-meta__views"> 1720</li>
		                </ul>
		            </article>
		            <nav class="hkb-pagination"> </nav>
		        </div>
		    </div>
		</main>
        <aside id="sidebar">
            <section id="ht-kb-articles-widget-2" class="widget hkb_widget_articles clearfix">
                <h4 class="widget-title">Popular Articles</h4>
                <ul>
                    <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Preparing your server for installation</a>
                        <ul class="hkb-meta">
                            <li class="hkb-meta__usefulness hkb-meta__usefulness--good"> 636</li>
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
