@extends('layouts.public')

@section('title', $post->title)

@section('content')
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">

							<!-- Single Post
							============================================= -->
							<div class="entry clearfix">

								<!-- Entry Title
								============================================= -->
								<div class="entry-title">
									<h2>{{ $post->title }}</h2>
								</div><!-- .entry-title end -->

								<!-- Entry Meta
								============================================= -->
								<ul class="entry-meta clearfix">
									<li><i class="icon-calendar3"></i> {{ $post->created_at->toFormattedDateString()  }}</li>
									<li><i class="icon-user"></i> {{ $post->user->role->name }}</li>
									<li><i class="icon-folder-open"></i> <a href="#">{{ $post->category->name }}</a></li>
									<li><i class="icon-comments"></i> {{ count($post->comments) }}</li>
								</ul><!-- .entry-meta end -->

								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<img src="{{ $post->photo ? $post->photo->file : url('images/blog/standard/17.jpg') }}" alt="">
								</div><!-- .entry-image end -->

								<!-- Entry Content
								============================================= -->
								<div class="entry-content notopmargin">

									<p>{{ $post->content }}</p>
									<!-- Post Single - Content End -->
		

									<!-- Post Single - Share
									============================================= -->
									<div class="si-share noborder clearfix">
										<span>Share this Post:</span>
										<div>
											<a href="#" class="social-icon si-borderless si-facebook">
												<i class="icon-facebook"></i>
												<i class="icon-facebook"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-twitter">
												<i class="icon-twitter"></i>
												<i class="icon-twitter"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-pinterest">
												<i class="icon-pinterest"></i>
												<i class="icon-pinterest"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-gplus">
												<i class="icon-gplus"></i>
												<i class="icon-gplus"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-rss">
												<i class="icon-rss"></i>
												<i class="icon-rss"></i>
											</a>
											<a href="#" class="social-icon si-borderless si-email3">
												<i class="icon-email3"></i>
												<i class="icon-email3"></i>
											</a>
										</div>
									</div><!-- Post Single - Share End -->

								</div>
							</div><!-- .entry end -->							

							<!-- Post Author Info
							============================================= -->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Posted by <span><a href="#">{{ $post->user->name }}</a></span></h3>
								</div>
								<div class="panel-body">
									<div class="author-image">
										<img src="{{ $post->user->photo ? $post->user->photo->file : url('images/author/1.jpg') }}" alt="" class="img-circle">
									</div>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eveniet, eligendi et nobis neque minus mollitia sit repudiandae ad repellendus recusandae blanditiis praesentium vitae ab sint earum voluptate velit beatae alias fugit accusantium laboriosam nisi reiciendis deleniti tenetur molestiae maxime id quaerat consequatur fugiat aliquam laborum nam aliquid. Consectetur, perferendis?
								</div>
							</div><!-- Post Single - Author End -->


							<!-- Comments
							============================================= -->
							<div id="comments" class="clearfix">

								<h3 id="comments-title"><span>3</span> Comments</h3>

								<!-- Comments List
								============================================= -->
								<ol class="commentlist clearfix">

									<li class="comment even thread-even depth-1" id="li-comment-1">

										<div id="comment-1" class="comment-wrap clearfix">

											<div class="comment-meta">

												<div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

												</div>

											</div>

											<div class="comment-content clearfix">

												<div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2012 at 10:46 am</a></span></div>

												<p>Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

												@if(Auth::check())
													<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>
												@endif

											</div>

											<div class="clear"></div>

										</div>


										<ul class='children'>

											<li class="comment byuser comment-author-_smcl_admin odd alt depth-2" id="li-comment-3">

												<div id="comment-3" class="comment-wrap clearfix">

													<div class="comment-meta">

														<div class="comment-author vcard">

															<span class="comment-avatar clearfix">
															<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=40&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D40&amp;r=G' class='avatar avatar-40 photo' height='40' width='40' /></span>

														</div>

													</div>

													<div class="comment-content clearfix">

														<div class="comment-author"><a href='#' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

														<p>Nullam id dolor id nibh ultricies vehicula ut id elit.</p>


													</div>

													<div class="clear"></div>

												</div>

											</li>

										</ul>

									</li>

									<li class="comment byuser comment-author-_smcl_admin even thread-odd thread-alt depth-1" id="li-comment-2">

										<div id="comment-2" class="comment-wrap clearfix">

											<div class="comment-meta">

												<div class="comment-author vcard">

													<span class="comment-avatar clearfix">
													<img alt='' src='http://1.gravatar.com/avatar/30110f1f3a4238c619bcceb10f4c4484?s=60&amp;d=http%3A%2F%2F1.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G' class='avatar avatar-60 photo' height='60' width='60' /></span>

												</div>

											</div>

											<div class="comment-content clearfix">

												<div class="comment-author"><a href='http://themeforest.net/user/semicolonweb' rel='external nofollow' class='url'>SemiColon</a><span><a href="#" title="Permalink to this comment">April 25, 2012 at 1:03 am</a></span></div>

												<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>

												@if(Auth::check())
													<a class='comment-reply-link' href='#'><i class="icon-reply"></i></a>
												@endif

											</div>

											<div class="clear"></div>

										</div>

									</li>

								</ol><!-- .commentlist end -->

								<div class="clear"></div>

								@if (Auth::check())

									<!-- Comment Form
									============================================= -->
									<div id="respond" class="clearfix">

										<h3>Leave a <span>Comment</span></h3>

										<form class="clearfix" action="#" method="post" id="commentform">

											<div class="col_one_third">
												<label for="author">Name</label>
												<input type="text" name="author" id="author" value="" size="22" tabindex="1" class="sm-form-control" />
											</div>

											<div class="col_one_third">
												<label for="email">Email</label>
												<input type="text" name="email" id="email" value="" size="22" tabindex="2" class="sm-form-control" />
											</div>

											<div class="col_one_third col_last">
												<label for="url">Website</label>
												<input type="text" name="url" id="url" value="" size="22" tabindex="3" class="sm-form-control" />
											</div>

											<div class="clear"></div>

											<div class="col_full">
												<label for="comment">Comment</label>
												<textarea name="comment" cols="58" rows="7" tabindex="4" class="sm-form-control"></textarea>
											</div>

											<div class="col_full nobottommargin">
												<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
											</div>

										</form>

									</div><!-- #respond end -->

								@endif



							</div><!-- #comments end -->

						</div>

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