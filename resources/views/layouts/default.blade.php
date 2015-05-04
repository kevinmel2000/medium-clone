<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	{!! HTML::style('lib/bootstrap/dist/css/bootstrap.min.css') !!}
	{!! HTML::style('assets/css/style.css') !!}
	{!! HTML::script('lib/jquery/dist/jquery.min.js') !!}
	{!! HTML::script('lib/bootstrap/dist/js/bootstrap.min.js') !!}
	@yield('head')
	<title>@yield('title')</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="" class="navbar-brand">MediumClone</a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="">HOME</a></li>
					<li><a href="">TOP STORIES</a></li>
					<li><a href="">BOOKMARKS</a></li>
				</ul>
			</div>
		</div>
	</nav>
	@yield('content')
</body>
</html>