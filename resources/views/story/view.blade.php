@extends('layouts.default')
@section('head')
	<meta property="og:image" content="{{ URL::Route('home') }}/images/{{ $story->user->profilePicture }}">
@stop
@section('title',$story->title)
@section('content')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<header class="text-center">
				<div class="page-header">
					<h1>{{$story->title}} <small>{{ $story->user->name }}</small></h1>
				</div>
			</header>
			<article>
				{!! $story->content !!}
			</article>
			<div class="user-info">
				<div class="row">
					<div class="col-xs-2">
						<img class="img-circle" src="{{ URL::Route('home') }}/images/{{ $story->user->profilePicture }}" alt="">
					</div>
					<div class="col-xs-9">
						<h2><a href="{{ URL::Route('user.show',$story->user->username) }}">{{ $story->user->name }}</a></h2>
						<strong>Joined Since {{ $story->user->created_at->diffForHumans() }}</strong>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop