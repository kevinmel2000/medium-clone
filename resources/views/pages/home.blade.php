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
						<a class="article" href="{{URL::Route('story.show',$story->slug)}}">
						<article>
							<h2>{{$story->title}}</h2>
							<small><a href="{{URL::Route('home')}}/user/{{ $story->user->username }}">{{ '@' . $story->user->username }}</a> | {{$story->created_at->diffForHumans()}}</small>
							<div class="body">
								{!! substr($story->content,0,400) !!} ...
							</div>

							@if (Auth::check() && Auth::user()->username == $story->user->username)
								<br>
								{!! Form::open(['route'=>['story.destroy',$story->id],'method'=>'delete']) !!}
									<button class="btn btn-danger">Delete</button>
								{!! Form::close() !!}
								{!! Form::open(['route'=>['story.edit',$story->id],'method'=>'get']) !!}
									<button class="btn btn-warning">Edit</button>
								{!! Form::close() !!}
							@endif

						</article>
						</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop