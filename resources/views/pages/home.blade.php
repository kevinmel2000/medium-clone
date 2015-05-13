@extends('layouts.default')
@section('head')
	
@stop
@section('title','Medium Clone')
@section('content')
	<div class="container">
		<div class="mainContent" style="margin-top:50px;">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					@foreach($stories as $story)
						<a class="article" href="{{URL::Route('home')}}/user/{{ $story->user->username . '/' . $story->slug }}">
						<article>
							<h2>{{$story->title}}</h2>
							<small><a href="{{URL::Route('home')}}/user/{{ $story->user->username }}">{{ '@' . $story->user->username }}</a> | {{$story->created_at->diffForHumans()}}</small>
							<div class="body">
								{!! substr($story->content,0,200) !!} ...
							</div>
						</article>
						</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop