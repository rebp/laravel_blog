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

						<div class="entry clearfix">
							<div class="entry-image">
								<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
							</div>
							<div class="entry-title">
								<h2><a href="{{ url('/post') }}">This is a Standard post with a Preview Image</a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> 10th February 2014</li>
								<li><a href="#"><i class="icon-user"></i> admin</a></li>
								<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
								<li><a href="{{ url('/post') }}#comments"><i class="icon-comments"></i> 13 Comments</a></li>
								<li><a href="#"><i class="icon-camera-retro"></i></a></li>
							</ul>
							<div class="entry-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
								<a href="{{ url('/post') }}"class="more-link">Read More</a>
							</div>
						</div>

						<div class="entry clearfix">
							<div class="entry-image">
								<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
							</div>
							<div class="entry-title">
								<h2><a href="{{ url('/post') }}">This is a Standard post with a Preview Image</a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> 10th February 2014</li>
								<li><a href="#"><i class="icon-user"></i> admin</a></li>
								<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
								<li><a href="{{ url('/post') }}#comments"><i class="icon-comments"></i> 13 Comments</a></li>
								<li><a href="#"><i class="icon-camera-retro"></i></a></li>
							</ul>
							<div class="entry-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
								<a href="{{ url('/post') }}"class="more-link">Read More</a>
							</div>
						</div>	

						<div class="entry clearfix">
							<div class="entry-image">
								<a href="images/blog/full/17.jpg" data-lightbox="image"><img class="image_fade" src="images/blog/standard/17.jpg" alt="Standard Post with Image"></a>
							</div>
							<div class="entry-title">
								<h2><a href="{{ url('/post') }}">This is a Standard post with a Preview Image</a></h2>
							</div>
							<ul class="entry-meta clearfix">
								<li><i class="icon-calendar3"></i> 10th February 2014</li>
								<li><a href="#"><i class="icon-user"></i> admin</a></li>
								<li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a></li>
								<li><a href="{{ url('/post') }}#comments"><i class="icon-comments"></i> 13 Comments</a></li>
								<li><a href="#"><i class="icon-camera-retro"></i></a></li>
							</ul>
							<div class="entry-content">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, asperiores quod est tenetur in. Eligendi, deserunt, blanditiis est quisquam doloribus voluptate id aperiam ea ipsum magni aut perspiciatis rem voluptatibus officia eos rerum deleniti quae nihil facilis repellat atque vitae voluptatem libero at eveniet veritatis ab facere.</p>
								<a href="{{ url('/post') }}"class="more-link">Read More</a>
							</div>
						</div>	


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
								<li><a href=""><div>Animations</div></a></li>
								<li><a href=""><div>Buttons</div></a></li>
								<li><a href=""><div>Carousel</div></a></li>
								<li><a href=""><div>Charts</div></a></li>
								<li><a href=""><div>Clients</div></a></li>
								<li><a href=""><div>Columns</div></a></li>
								<li><a href=""><div>Counters</div></a></li>
								<li><a href=""><div>Dividers</div></a></li>
								<li><a href=""><div>Icon Boxes</div></a></li>
								<li><a href=""><div>Galleries</div></a></li>
								<li><a href=""><div>Heading Styles</div></a></li>
								<li><a href=""><div>Icon Lists</div></a></li>
								<li><a href=""><div>Labels</div></a></li>
								<li><a href=""><div>Lightbox</div></a></li>
							</ul>

						</div>

					</div>

				</div><!-- .sidebar end -->

			</div>

		</div>

	</section><!-- #content end -->	
@endsection