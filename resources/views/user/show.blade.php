@extends('layouts.default')
@section('head')
	{!! HTML::style('assets/css/user.css') !!}
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
	</div>
@stop