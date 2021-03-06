<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content="@yield('title')">
	<meta name="title" content="@yield('title')">
	{!! HTML::style('lib/bootstrap/dist/css/bootstrap.min.css') !!}
	{!! HTML::style('lib/font-awesome/css/font-awesome.min.css') !!}
	{!! HTML::style('assets/css/style.css') !!}
	{!! HTML::script('lib/jquery/dist/jquery.min.js') !!}
	{!! HTML::script('lib/toastr/toastr.min.js') !!}
	{!! HTML::script('lib/bootstrap/dist/js/bootstrap.min.js') !!}
	{!! HTML::script('assets/highlight/highlight.pack.js') !!}
	{!! HTML::style('assets/highlight/styles/monokai.css') !!}
	{!! HTML::style('lib/toastr/toastr.min.css') !!}
	{!! HTML::script('//js.pusher.com/2.2/pusher.min.js') !!}
	{!! HTML::script('lib/angular/angular.min.js') !!}
	{!! HTML::script('assets/js/core-ang.js') !!}
	{!! HTML::script('assets/js/default.js') !!}
	@if(Auth::check())
		<script>
			var pusher = new Pusher('f7c64c5b8411649b6090');
			var channel = pusher.subscribe("{{ Auth::user()->id }}");
			channel.bind('my_event', function(data) {
			toastr.info(data.message,"Notifikasi",{onclick: function(){ window.location = "{{ URL::Route('home') }}" + "/story/" + data.link }} );
		  	$('<audio src="{{ URL::Route('home') }}/notif.mp3" autoplay></audio>').appendTo('body');
			});
		</script>
	@endif
	@yield('head')
	<title>@yield('title')</title>
</head>
<body ng-app="medium">
@if(Auth::check())
	<input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
@endif
<div id="fb-root"></div>
	<audio src="/notif.mp3" id="notifSound"></audio>
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
					<li><a href="{{URL::Route('home')}}">Home</a></li>
					<li><a href="{{URL::Route('series.index')}}">Series</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right" ng-controller="notifController">
					@if(Auth::check())
						@if(App\Notification::where('user_id',Auth::user()->id)->where('read',0)->count() > 0)
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell redColor"></i> <span class="badge">{{ App\Notification::where('user_id',Auth::user()->id)->where('read',0)->count() }}</span></a>
								<ul class="dropdown-menu" role="menu">
									@foreach( App\Notification::where('user_id',Auth::user()->id)->where('read',0)->orderBy('created_at','desc')->get() as $item)
										<li><a ng-click="clearNotif({{ $item->id }})" href="{{ URL::Route('home') }}/story/{{ $item->link }}"> <i class="fa fa-comment-o"></i> {{$item->message}} </a></li>
									@endforeach
								</ul>
							</li>
						@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-bell"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li>Tidak ada notifikasi untuk saat ini</li>
								</ul>
							</li>
						@endif

						<li><a href="{{URL::Route('story.create')}}">New Story</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ucwords(Auth::user()->name)}} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{URL::Route('user.show',Auth::user()->username)}}">Profile</a></li>
								<li><a href="{{URL::Route('user.setting',Auth::user()->username)}}">Settings</a></li>
								<li><a href="{{URL::Route('series.create')}}">New Series</a></li>
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
      </div>
    </div>
  </div>
</div>
</body>
</html>