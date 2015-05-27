@extends('layouts.default')
@section('head')
	<meta property="og:image" content="{{ URL::Route('home') }}/images/{{ $story->user->profilePicture }}">
	{!! HTML::script('assets/js/comment.js') !!}
@stop
@section('title',$story->title)
@section('content')
	<div class="container">
		<div class="col-md-9">
			<header>
				<div class="page-header">
					<h1>{{$story->title}} <small>{{ $story->user->name }}</small></h1>
					<p><strong>{{ $story->bad_count }}</strong> kali dilihat</p>
				</div>
			</header>
			<article>
				{!! $story->content !!}
			<div class="fb-like" data-href="{{ URL::Route('story.show',$story->slug) }}" data-width="100%" data-layout="standard" data-action="recommend" data-show-faces="true" data-share="true"></div>
			</article>
			<div ng-app="comment">
				<div class="comments" ng-controller="myComment">
					{!! Form::hidden('user_id',$story->user->id,['id'=>'user_id']) !!}
					{!! Form::hidden('story_id',$story->id,['id'=>'story_id']) !!}
					<ul class="list-comment">
						<h3>Komentar</h3>
						<br>
						<li ng-repeat="data in datas">
						<img class="pull-left ava-comment" src="{{ URL::Route('home') }}/images/[[ data.user.profilePicture ]]" alt="[[ data.user.name ]]">
						<a href="{{ URL::Route('home') }}/user/[[ data.user.username ]]"><strong>[[data.user.name]]</strong></a><br><br><p style="font-size:18px;">[[data.content]]</p></a>
						</li>
					</ul>
					@if(Auth::check())
						<form ng-submit="postComment($event)">
							{!! Form::textarea('content','',['class'=>'form-control','required','style'=>'height:130px;','placeholder'=>'Beri komentar yang mendidik.','ng-model'=>'content']) !!}
							{!! Form::hidden('token',csrf_token(),['id'=>'token']) !!}
							<br>
							{!! Form::submit('Komentar',['class'=>'btn btn-primary pull-right']) !!}
						</form>
					@else
						<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Login dulu kalo mau komentar :"))</a>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-3 sidebar-fixed-right">
			<div class="text-right">
				<br>
				<h3>{{ $serie->title }}</h3>
				<p> {{ $serie->description }} </p>	
			</div>

			<ul class="list-group no-radius">
				@foreach($parents as $parent)
					@if ($parent->slug == $story->slug)
						<li class="list-group-item text-right active">
							<a href="{{URL::Route('story.show',$parent->slug)}}">{{ $parent->title }}</a>
						</li>
					@else
						<li class="list-group-item text-right">
							<a href="{{URL::Route('story.show',$parent->slug)}}">{{ $parent->title }}</a>
						</li>
					@endif	
				@endforeach
			</ul>
		</div>
	</div>
@stop