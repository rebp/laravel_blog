@extends('layouts.public')

@section('title', $post->title)

@section('content')
				
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

				@if(Session::has('created_comment'))
					<div class="style-msg successmsg">
						<div class="sb-msg"><i class="icon-thumbs-up"></i> {{ session('created_comment') }}</div>
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					</div>
				@endif

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

								<h3 id="comments-title"><span>{{ count($post->comments) }}</span> Comments</h3>

								<!-- Comments List
								============================================= -->

								
									
								

								<ol class="commentlist clearfix">

									@foreach($post->comments as $comment)

										<li class="comment even thread-even depth-1" id="li-comment-1">

											<div id="comment-1" class="comment-wrap clearfix">

												<div class="comment-meta">

													<div class="comment-author vcard">

														<span class="comment-avatar clearfix">
														<img alt='' src="{{ $comment->photo }}" class='avatar avatar-60 photo avatar-default' height='60' width='60' /></span>

													</div>

												</div>

												<div class="comment-content clearfix">

													<div class="comment-author">{{ $comment->author }}<span><a href="#" title="Permalink to this comment">{{ $comment->created_at->diffForHumans() }}</a></span></div>

													<p>{{ $comment->content }}</p>

													@if(Auth::check())
														<a class='comment-reply-link' href='#replyModal' data-lightbox="inline"><i class="icon-reply"></i></a>																	
													@endif

												</div>

												<div class="clear"></div>

											</div>

										</li>

									@endforeach

								</ol><!-- .commentlist end -->

								<div class="clear"></div>

								@if (Auth::check())

									<!-- Comment Form
									============================================= -->
									<div id="respond" class="clearfix">

										<h3>Leave a <span>Comment</span></h3>

										{!! Form::open((['action' => 'PostCommentsController@store', 'method' => 'post'])) !!}

											<div class="col_full">									
												{!! Form::textarea('content', null, ['class' => 'sm-form-control']) !!}
												@if ($errors->has('content'))
													<span class="text-danger">
														<strong>{{ $errors->first('content') }}</strong>
													</span>
												@endif
											</div>

											<div class="col_full nobottommargin">
												{!! Form::submit('Submit', ['class' => 'button button-3d nomargin']) !!}							
												{!! Form::hidden('post_id', $post->id) !!}
											</div>

										{!! Form::close() !!}

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

		<div data-target="#replyModal"></div>

		<!-- Modal -->
		<div class="modal1 mfp-hide" id="replyModal">
			<div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
				<div class="center" style="padding: 50px;">
					<h3>Reply this <span>Comment</span></h3>

					{!! Form::open((['action' => 'PostCommentsController@store', 'method' => 'post'])) !!}

						<div class="col_full">									
							{!! Form::textarea('content', null, ['class' => 'sm-form-control']) !!}
							@if ($errors->has('content'))
								<span class="text-danger">
									<strong>{{ $errors->first('content') }}</strong>
								</span>
							@endif
						</div>

						<div class="col_full nobottommargin">
							{!! Form::submit('Submit', ['class' => 'button button-3d nomargin']) !!}							
							{!! Form::hidden('post_id', $post->id) !!}
						</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>

@endsection