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
                <a itemprop="item" href="/portal/kb/categories/getting-started" title="View all posts in Getting Started"> <span itemprop="name">Getting Started</span> </a>
                <meta itemprop="position" content="3" />
            </li>
			<li itemprop="itemListElement">
                <a itemprop="item" href="#" title="Preparing your server for installation"> <span itemprop="name">Preparing your server for installation</span> </a>
                <meta itemprop="position" content="4" />
            </li>
        </ol>
    </div>
</section>
<div id="primary" class="sidebar-right clearfix">
    <div class="container">
        <main id="content" role="main" itemscope="itemscope" itemprop="mainContentOfPage">
            <div id="hkb" class="hkb-template-single">
                <article id="post-277" class="post-277 ht_kb type-ht_kb status-publish format-standard hentry ht_kb_category-getting-started" itemtype="http://schema.org/CreativeWork" itemscope="itemscope">
                    <header class="entry-header">
                        <h1 class="entry-title" itemprop="headline"> Preparing your server for installation</h1>
                        <ul class="hkb-entry-meta clearfix">
                            <li class="hkb-em-date"> <span>Created</span>
                                <a href="#" rel="bookmark" itemprop="url">
                                    <time datetime="2017-06-01" itemprop="datePublished">June 1, 2017</time>
                                </a>
                            </li>
                            <li class="ht-kb-em-author"> <span>Author</span> <a class="url fn n" href="#" title="Jim Smith" rel="me" itemprop="author">Jim Smith</a></li>
                            <li class="ht-kb-em-category"> <span>Category</span> <a href="/portal/kb/categories/getting-started" rel="tag">Getting Started</a></li>
                            <li class="ht-kb-em-comments"> <span>Comments</span> <a href="#comments">1</a></li>
                        </ul>
                    </header>
                    <div class="hkb-entry-content">
                        <div class="hkb-article__content entry-content" itemprop="articleBody">
							<?php
								// TODO: Database implementation to store and pull this information with markdown and JSON
								//		 Additionally, need prettify.js or equivalent for accurate syntax highlighting with preformatted code blocks
							?>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nos vero, inquit ille; Quo tandem modo? Sint modo partes vitae beatae. Sed quae tandem ista ratio est? Nihil enim hoc differt. Duo Reges: constructio interrete. Ut pulsi
                                recurrant?</p>
                            <p>Praesent semper sagittis ex, ut facilisis nulla luctus eget. Nulla facilisi. Nam non dolor sit amet dolor consequat suscipit. Aenean dictum, eros vitae feugiat sodales, nunc mi fermentum dui, a vulputate ipsum urna at erat. Nullam bibendum bibendum nulla, eu bibendum orci lobortis pretium. Integer congue libero nisi. Maecenas posuere, est in venenatis hendrerit, libero felis egestas lacus, sit amet tempor tortor dui vitae quam. Nullam laoreet ante vel odio sagittis scelerisque. Nullam interdum sapien nisl.</p>
                            <p>Integer elementum congue ante. Pellentesque ac metus luctus, interdum neque sodales, hendrerit arcu. Nulla viverra lacus sed sem sollicitudin, et porttitor libero feugiat. Suspendisse quis arcu at nulla laoreet molestie. Sed quis imperdiet arcu. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ac placerat libero, vestibulum tempus mi. Sed sed sem eget neque eleifend lobortis.</p>
							<pre>
function test(var $test = null) {
	printf "this is just a test"
}
							</pre>
							<p>Morbi porta non odio nec posuere. Vivamus rutrum lectus ac fringilla suscipit. Donec tempor erat in tortor vulputate, nec porttitor lacus rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ante ex, vulputate in malesuada eu, pharetra nec nulla. Suspendisse id magna elit. Quisque laoreet ligula ex, sed laoreet ipsum placerat nec. Phasellus vehicula neque odio.</p>
                            <blockquote cite='http://loripsum.net'>
                                <p>Sweet blockquote dude!</p>
                            </blockquote>
                            <p>And that about wraps up this placeholder page.</p>
                        </div>
                        <div class="hkb-feedback">
                            <h3 class="hkb-feedback__title">Was this article helpful?</h3>
                            <div class="ht-voting" id="ht-voting-post-277">
								<div class="ht-voting-links ht-voting-none"> <a class="ht-voting-upvote enabled" rel="nofollow" data-direction="up" data-type="post" data-nonce="c70117d1e3" data-id="277" data-allow="anon" data-display="standard" href="#"><i class="hkb-upvote-icon"></i><span>Yes</span></a> <a class="ht-voting-downvote enabled"
								rel="nofollow" data-direction="down" data-type="post" data-nonce="c70117d1e3" data-id="277" data-allow="anon" data-display="standard" href="#"><i class="hkb-upvote-icon"></i><span>No</span></a></div>
                            </div>
                        </div>
                    </div>
                </article>
                <section class="hkb-article-related" class="clearfix">
                    <h3 class="hkb-article-related__title">Related Articles</h3>
                    <ul class="hkb-article-list">
                        <li class="hkb-article-list__format-standard"> <a href="#" title="How do I contact Customer Care?">How do I contact Customer Care?</a>
                            <ul class="hkb-meta">
                                <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                                <li class="hkb-meta__views"> 1024</li>
                            </ul>
                        </li>
                        <li class="hkb-article-list__format-standard"> <a href="#" title="Creating a multilingual site">Creating a multilingual site</a>
                            <ul class="hkb-meta">
                                <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                                <li class="hkb-meta__views"> 1024</li>
                            </ul>
                        </li>
                        <li class="hkb-article-list__format-standard"> <a href="#" title="Choosing the right billing plan">Choosing the right billing plan</a>
                            <ul class="hkb-meta">
                                <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                                <li class="hkb-meta__views"> 1024</li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <section id="comments" class="comments-area clearfix" itemprop="comment">
                    <h3 id="comments-title"> 1 Comment</h3>
                    <ol class="comment-list">
                        <li class="comment byuser comment-author-demo1 even thread-even depth-1" id="li-comment-12">
                            <article id="comment-12" class="comment-block clearfix" itemtype="http://schema.org/UserComments" itemscope="itemscope" itemprop="comment">
                                <header class="comment-header">
                                    <div class="comment-author" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="creator"> <img alt='' src="{{ asset('img/default_profile_male.png') }}" srcset="{{ asset('img/default_profile_male.png') }}" class='avatar preview'
                                    	 height='60' width='60' /> <span class="comment-author-name" itemprop="name"><cite class="fn">Mike Jones</cite></span></div>
                                    <time class="comment-time" datetime="2015-07-03T15:31:56+00:00" itemprop="commentTime">
                                    <a itemprop="url" href="#">1 week ago</a> </time>
                                </header>
                                <div class="comment-content clearfix" itemprop="commentText">
                                    <p>This article is exactly what I needed help with. Fantastic!</p>
                                </div>
                                <footer class="comment-footer">
                                    <div class="comment-action"> <a rel='nofollow' class='comment-reply-link' href="#" aria-label='Reply to Debby Jonelle'>Reply</a></div>
                                </footer>
                            </article>
                        </li>
						<li class="comment byuser comment-author-demo1 even thread-even depth-1" id="li-comment-12">
                            <article id="comment-12" class="comment-block clearfix" itemtype="http://schema.org/UserComments" itemscope="itemscope" itemprop="comment">
                                <header class="comment-header">
                                    <div class="comment-author" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="creator"> <img alt='' src="{{ asset('img/default_profile_male.png') }}" srcset="{{ asset('img/default_profile_male.png') }}" class='avatar preview'
                                    	 height='60' width='60' /> <span class="comment-author-name" itemprop="name"><cite class="fn">Jim Smith (author)</cite></span></div>
                                    <time class="comment-time" datetime="2015-07-03T15:31:56+00:00" itemprop="commentTime">
                                    <a itemprop="url" href="#">10 min ago</a> </time>
                                </header>
                                <div class="comment-content clearfix" itemprop="commentText">
                                    <p>Wow! Funny, this wasn't posted that long ago and it already has a lot of viwes and thumbs up. Suprisingly enough, they're all the same counts. Heh.</p>
                                </div>
                                <footer class="comment-footer">
                                    <div class="comment-action"> <a rel='nofollow' class='comment-reply-link' href="#" aria-label='Reply to Debby Jonelle'>Reply</a></div>
                                </footer>
                            </article>
                        </li>
                    </ol>
                </section>
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Leave A Comment? <small><a rel="nofollow" id="cancel-comment-reply-link" href="/portal/kb/1#respond" style="">Cancel Reply</a></small></h3>
                    <form action="#" method="post">
                        <p class="comment-form-comment">
                            <textarea id="comment" name="comment" placeholder="Your Comment" cols="45" rows="5" aria-required="true"></textarea>
                        </p>
                        <p class="comment-form-author"><span class="ht-input-wrapper"><input id="author" name="author" type="text" placeholder="Name" size="30" aria-required='true' /></span></p>
                        <p class="comment-form-email"><span class="ht-input-wrapper"><input id="email" name="email" type="email" placeholder="Email" size="30" aria-required='true' /></span></p>
                        <p class="comment-form-url"><span class="ht-input-wrapper"><input id="url" name="url" type="url" placeholder="Website" size="30" /></span></p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" />
						</p>
                    </form>
                </div>
            </div>
        </main>
        <aside id="sidebar">
            <section id="ht-kb-articles-widget-2" class="widget hkb_widget_articles clearfix">
                <h4 class="widget-title">Popular Articles</h4>
                <ul>
                    <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Preparing your server for installation</a>
                        <ul class="hkb-meta">
                            <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                            <li class="hkb-meta__comments"> 1</li>
                        </ul>
                    </li>
                    <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Can I attach files to forms?</a>
                        <ul class="hkb-meta">
                            <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                        </ul>
                    </li>
                    <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">How do I contact Customer Care?</a>
                        <ul class="hkb-meta">
                            <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                        </ul>
                    </li>
                    <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">How to enable labs features</a>
                        <ul class="hkb-meta">
                            <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                        </ul>
                    </li>
                    <li class="hkb-widget-article__format-standard"><a class="hkb-widget__entry-title" href="#">Why Was My Developer Application Rejected?</a>
                        <ul class="hkb-meta">
                            <li class="hkb-meta__usefulness hkb-meta__usefulness--good">123</li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
    </div>
</div>
@endsection
