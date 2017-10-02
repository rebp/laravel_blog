<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link href="{{ url('css/bundle.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Dashboard | {{ auth()->user()->name }}</title>

</head>

<body class="stretched side-header">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="no-sticky">

			<div id="header-wrap">

				<div class="container clearfix">


					<!-- User 
					============================================= -->
                    <div class="col_full topmargin">

                        <img src="{{ url('images/icons/avatar.jpg') }}" class="alignleft img-circle img-thumbnail nobottommargin" alt="Avatar" style="max-width: 84px;">

                        <div class="heading-block noborder">
                            <h3>{{ auth()->user()->name }}</h3>
                            <span>Admin</span>
                        </div>
                    </div>

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="#"><div><i class="icon-user"></i> Profile</div></a></li>
							<li><a href="#"><div><i class="icon-users"></i> Users</div></a>
								<ul>
									<li><a href="{{ route('admin.users.index') }}"><div>All Useres</div></a></li>
									<li><a href="{{ route('admin.users.create') }}"><div>Create User</div></a></li>									
								</ul>
							</li>							
							<li><a href="#"><div><i class="icon-pencil2"></i> Posts</div></a>
								<ul>
									<li><a href="{{ route('admin.posts.index') }}"><div>All Posts</div></a></li>
									<li><a href="{{ route('admin.posts.create') }}"><div>Create Post</div></a></li>								
								</ul>
							</li>
							<li><a href="#"><div><i class="icon-reply"></i> Comments</div></a>
								<ul>
									<li><a href="#"><div>All Comments</div></a></li>									
								</ul>
							</li>
							<li><a href="#"><div><i class="icon-line-layers"></i> Categories</div></a>
								<ul>
									<li><a href="#"><div>All Categories</div></a></li>								
								</ul>
							</li>
                            <li><a href="{{ url('/home') }}"><div><i class="icon-blogger"></i> Blog</div></a></li>
                            <li><a href="{{ url('/logout') }}"><div><i class="icon-signout"></i> Logout</div></a></li>
						</ul>

					</nav><!-- #primary-menu end -->

            

				</div>

			</div>

		</header><!-- #header end -->

		@yield('content')


	</div><!-- #wrapper end -->

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="{{ url('js/script.js') }}"></script>

</body>
</html>