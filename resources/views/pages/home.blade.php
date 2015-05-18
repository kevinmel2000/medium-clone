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
							<div class="pull-right">
								@include('components.userRight')
							</div>
							<h2>{{$story->title}}</h2>
							<small><a href="{{URL::Route('home')}}/user/{{ $story->user->username }}">{{ '@' . $story->user->username }}</a> | {{$story->created_at->diffForHumans()}}</small>
							<div class="body">
								<br>
								<div class="row">
									<div class="col-sm-4">
										@if (preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $story->content, $image))
											<img src="{{ $image[1][0] }}" alt="{{ $story->title }}">
										@else
											<img src="{{ URL::Route('home') }}/images/{{ $story->user->profilePicture }}" alt="{{ $story->user->name }}">
										@endif
									</div>

									<div class="col-sm-8">
										{!! strip_tags(substr(preg_replace('#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>((?!</a>))#', '', $story->content),0,200)) !!} ...
									</div>
								</div>
							</div>
						</article>
						</a>
					@endforeach
				</div>
			</div>
		</div>

		<div class="text-center">
			{!! $stories->render() !!}
		</div>
	</div>
@stop