<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
      appId      : '1527090690898815',
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1527090690898815";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
								<li><a href="{{URL::Route('story.create')}}">New Story</a></li>
								<li><a href="{{URL::Route('user.show',Auth::user()->username)}}">Profile</a></li>
								<li><a href="{{URL::Route('user.setting',Auth::user()->username)}}">Settings</a></li>
								<li class="divider"></li>
								<li><a href="{{ URL::Route('logout') }}">Logout</a></li>
							</ul>
						</li>
					@else
						<li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        <div class="page-header text-center">
        	<h2>Medium Clone</h2>
        	<p>Login and create awesome story.</p>
        </div>
        	<a href="{{ URL::Route('home') }}/socialize/facebook" class="btn btn-primary btn-block">Login with Facebook</a>
			<hr>
			{{--
			{!! Form::open(['route'=>'user.postLogin']) !!}
				<div class="form-group">
					<label for="email">Email</label>
					{!! Form::email('email','',['class'=>'form-control','required','placeholder'=>'ex : someone@domain.com']) !!}
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					{!! Form::password('password',['class'=>'form-control','required']) !!}
				</div>
				<div class="checkout">
					<label for="rememberMe">
						<input type="checkbox" name="rememberMe" checked="true"> Remember Me ?
					</label>
				</div>
				{!! Form::submit('Log In',['class'=>'btn btn-warning btn-block']) !!}
			{!! Form::close() !!}
			<br>
			<b><a href="{{ URL::Route('user.register') }}">Don't have account yet ?</a></b>
			--}}
      </div>
    </div>
  </div>
</div>

</body>
</html>