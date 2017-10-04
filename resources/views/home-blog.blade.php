@extends('layouts.public')

@section('title', 'Blog')

@section('content')
	<!-- Content
	============================================= -->
	<section id="content">

		<div class="content-wrap">

			<div class="container clearfix">

				<!-- Post Content
				============================================= -->
				<div class="postcontent nobottommargin clearfix">

					<!-- Posts
					============================================= -->
					<div id="posts">

						@foreach($posts as $post)
						
							<div class="entry clearfix">
								<div class="entry-image">
									<img src="{{ $post->photo ? $post->photo->file : url('images/blog/standard/17.jpg') }}" alt="">
								</div>
								<div class="entry-title">
									<h2>{{ $post->title }}</h2>
								</div>
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> {{ $post->created_at->toFormattedDateString()  }}</li>
									<li><i class="icon-user"></i> {{ $post->user->role->name }}</li>
									<li><i class="icon-folder-open"></i> <a href="#">{{ $post->category->name }}</a></li>
									<li><i class="icon-comments"></i> {{ count($post->comments) }}</li>
								</ul>
								<div class="entry-content">
									<p>{{ $post->content }}</p>
									<a href="{{ route('home.post', $post->id) }}"class="more-link">Read More</a>
								</div>
							</div>

						@endforeach


					</div><!-- #posts end -->

					<!-- Pagination
					============================================= -->
					<ul class="pager nomargin">
						<li class="previous"><a href="#">&larr; Older</a></li>
						<li class="next"><a href="#">Newer &rarr;</a></li>
					</ul><!-- .pager end -->

				</div><!-- .postcontent end -->

				<!-- Sidebar
				============================================= -->
				<div class="sidebar nobottommargin col_last clearfix">
					<div class="sidebar-widgets-wrap">

						<div id="shortcodes" class="widget widget_links clearfix">

							<h4 class="highlight-me">Categories</h4>
							<ul>
								@foreach($categories as $category)
									<li><a href="#"><div>{{ $category->name }}</div></a></li>
								@endforeach								
							</ul>

						</div>

					</div>

				</div><!-- .sidebar end -->

			</div>

		</div>

	</section><!-- #content end -->	
@endsection