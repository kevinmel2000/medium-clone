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
				<div class="page-header">
					<h1>Edit Story</h1>
				</div>
				{!! Form::open(['route','story.update']) !!}
				{!! Form::text('title',$story->title,['class'=>'form-control input-lg','placeholder'=>'TITLE']) !!}
				{!! Form::textarea('content',$story->content,['class'=>'summernote']) !!}
				{!! Form::submit('Publish',['class'=>'btn btn-primary btn-block']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop