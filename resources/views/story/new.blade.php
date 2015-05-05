@extends('layouts.default')
@section('head')
	{!! HTML::style('lib/font-awesome/css/font-awesome.min.css') !!}
	{!! HTML::style('lib/summernote/dist/summernote.css') !!}
	{!! HTML::script('lib/summernote/dist/summernote.min.js') !!}
	{!! HTML::script('assets/js/_newStory.js') !!}
@stop
@section('title','New Story')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::open(['route','user.storeStory']) !!}
				{!! Form::text('title','',['class'=>'form-control input-lg','placeholder'=>'TITLE']) !!}
				{!! Form::textarea('content','',['class'=>'summernote']) !!}
				{!! Form::submit('Publish',['class'=>'btn btn-primary btn-block']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop