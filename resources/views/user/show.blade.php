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
				@if($user->profilePicture == "")
					<img class="profilePict" src="{{URL::Route('home')}}/images/pict-default.png" alt="{{$user->name}}">
				@else
					<img class="profilePict" src="{{URL::Route('home')}}/images/{{$user->profilePicture}}" alt="{{$user->name}}">
				@endif
				<h1>{{ucwords($user->name)}}</h1>
				<p class="quotes">{{$user->quotes}}</p>
			</div>
		</div>

		<section class="story">
			<div class="row col-md-6 col-md-offset-3">
				@foreach($user->stories as $post)
					<a class="article" href="{{ URL::Route('story.show',$post->slug) }}">
					<article class="userProfile">
						<h2>{{ $post->title }}</h2>
						<small class="name">{{$post->created_at->diffForHumans()}}</small>
						<div class="body">
							@if (preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->content, $image))
								<img src="{{ $image[1][0] }}" alt="{{ $post->title }}">
							@endif
							{!! strip_tags(substr(preg_replace('#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>((?!</a>))#', '', $post->content),0,200)) !!} ...
							@if (Auth::check() && Auth::user()->username == $post->user->username)
								<br>
								<br>
								{!! Form::open(['route'=>['story.destroy',$post->id],'method'=>'delete','style'=>'float:left;margin-right:5px;']) !!}
									<button class="btn btn-danger">Delete</button>
								{!! Form::close() !!}
								{!! Form::open(['route'=>['story.edit',$post->id],'method'=>'get','style'=>'float:left']) !!}
									<button class="btn btn-warning">Edit</button>
								{!! Form::close() !!}
							@endif
						</div>
					</article>
					</a>
				@endforeach
			</div>
		</section>
	</div>
@stop