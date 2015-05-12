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
							<div class="user-information">
								@if($story->user->profilePicture == "")
									<img src="{{URL::Route('home')}}/images/pict-default.jpg" alt="" class="pull-left profilePicture">
								@else
									<img src="{{URL::Route('home')}}/images/{{$story->user->profilePict}}" alt="" class="pull-left profilePicture">
								@endif
								<p class="name">{{$story->user->name}} <span class="time">{{$story->created_at->diffForHumans()}}</span></p>
							</div>
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