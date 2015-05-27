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
						<section class="summary">
							<div class="pull-right">
								@include('components.userRight')
							</div>
							<a class="article" href="{{URL::Route('story.show',$story->slug)}}"><h2>{{$story->title}}</h2></a>
							<small><a href="{{URL::Route('home')}}/user/{{ $story->user->username }}">{{ '@' . $story->user->username }}</a> | {{$story->created_at->diffForHumans()}}</small>
							<div class="body">
								<br>
								<div class="row">
									<div class="col-sm-3">
										@if (preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $story->content, $image))
											<img src="{{ $image[1][0] }}" alt="{{ $story->title }}">
										@else
											<img class="img-rounded" src="{{ URL::Route('home') }}/images/{{ $story->user->profilePicture }}" alt="{{ $story->user->name }}">
										@endif
										<br>
										<br>
									</div>

									<div class="col-sm-9">
										<p>
											{!! strip_tags(substr(preg_replace('#<img([^>]*) src="([^"/]*/?[^".]*\.[^"]*)"([^>]*)>((?!</a>))#', '', $story->content),0,200)) !!} ...
										</p>
										@if($story->serie_id != 0)
											Part of <a href="{{ URL::Route('series.show',$story->serie->slug) }}">{{ $story->serie->title }}</a>
										@endif
									</div>
								</div>
							</div>
						</section>
					@endforeach
				</div>
			</div>
		</div>

		<div class="text-center">
			{!! $stories->render() !!}
		</div>
	</div>
@stop