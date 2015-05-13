<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta property="og:title" content="@yield('title')">
	<meta name="title" content="@yield('title')">
	{!! HTML::style('lib/bootstrap/dist/css/bootstrap.min.css') !!}
	{!! HTML::style('assets/css/style.css') !!}
	{!! HTML::script('lib/jquery/dist/jquery.min.js') !!}
	{!! HTML::script('lib/bootstrap/dist/js/bootstrap.min.js') !!}
	{!! HTML::script('assets/highlight/highlight.pack.js') !!}
	{!! HTML::style('assets/highlight/styles/monokai.css') !!}
	<script>
		$(document).ready(function() {
		  $('pre').each(function(i, block) {
		    hljs.highlightBlock(block);
		  });
		});
	</script>
	@yield('head')
	<title>@yield('title')</title>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your key',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="{{URL::Route('home')}}" class="navbar-brand">MediumClone</a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{URL::Route('home')}}">HOME</a></li>
					{{-- <li><a href="">TOP STORIES</a></li>
					<li><a href="">BOOKMARKS</a></li> --}}
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if(Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ucwords(Auth::user()->name)}} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{URL::Route('user.newStory')}}">New Story</a></li>
								<li><a href="{{URL::Route('user.show',Auth::user()->username)}}">Profile</a></li>
								<li><a href="{{URL::Route('user.setting',Auth::user()->username)}}">Settings</a></li>
								<li class="divider"></li>
								<li><a href="{{ URL::Route('logout') }}">Logout</a></li>
							</ul>
						</li>
					@else
						<li><a href="{{URL::Route('user.login')}}">Login</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')
</body>
</html>