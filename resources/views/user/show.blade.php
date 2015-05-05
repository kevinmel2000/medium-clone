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
				<button class="btn btn-primary edit-pictures" data-toggle="modal" data-target="#myModal">Edit</button>
			</div>
		</div>
	</div>
@stop
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body text-center">
      	<form action="">
      		<input type="file" name="pict" id="browsePict">
      	</form>
        @if($user->profilePict == "")
			<img id="crop" src="{{URL::Route('home')}}/images/pict-default.jpg" alt="{{$user->name}}">
		@else
			<img id="crop" src="{{URL::Route('home')}}/images/{{$user->proflePict}}" alt="{{$user->name}}">
		@endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>