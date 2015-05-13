@extends('layouts.default')
@section('head')
	{!! HTML::style('assets/css/user.css') !!}
	{!! HTML::style('lib/cropper/dist/cropper.min.css') !!}
	{!! HTML::script('lib/cropper/dist/cropper.min.js') !!}
	{!! HTML::script('assets/js/crop.js') !!}
@stop
@section('title',ucwords($user->name))
@section('content')
	@if($user->profileCover == "")
		<header style="background-image:url({{URL::Route('home')}}/images/cover-default.jpg)">
		</header>
	@else
		<header style="background-image:url({{URL::Route('home')}}/images/{{$user->profileCover}})">
		</header>
	@endif
	<div class="container">
		<div class="user-info text-center">
			<div class="profilePict">
				@if($user->profilePict == "")
					<img class="profilePict" src="{{URL::Route('home')}}/images/pict-default.jpg" alt="{{$user->name}}">
				@else
					<img class="profilePict" src="{{URL::Route('home')}}/images/{{$user->proflePict}}" alt="{{$user->name}}">
				@endif
				<h1>{{ucwords($user->name)}}</h1>
				<p class="quotes">{{$user->quotes}}</p>
			</div>
		</div>

		<section class="story">
			<div class="row col-md-6 col-md-offset-3">
				@foreach($user->stories as $post)
					<a class="article" href="{{ $user->username . '/' . $post->slug }}">
					<article class="userProfile">
						<h2>{{ $post->title }}</h2>
						<small class="name">{{$post->created_at->diffForHumans()}}</small>
						<div class="body">
							{!! substr($post->content,0,400) !!} ...
						</div>
					</article>
					</a>
				@endforeach
			</div>
		</section>
	</div>
@stop