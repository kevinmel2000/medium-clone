@extends('layouts.default')
@section('head')
	{!! HTML::style('lib/summernote/dist/summernote.css') !!}
	{!! HTML::style('assets/css/wysiwyg.css') !!}
	{!! HTML::script('lib/summernote/dist/summernote.min.js') !!}
	{!! HTML::script('assets/js/_newStory.js') !!}
@stop
@section('title','New Story')
@section('content')
	<div class="container">
		<div class="page-header">
			<h1>New Story</h1>
		</div>
		<div class="row">
			<div class="col-md-8">
				{!! Form::open(['route','story.store']) !!}
				{!! Form::hidden('bottime',time()) !!}
				{!! Form::text('title','',['class'=>'form-control input-lg','placeholder'=>'TITLE']) !!}
				{!! Form::textarea('content','',['class'=>'summernote']) !!}
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="serie">Add to series</label>
					<select name="serie" id="serie" class="form-control input-lg">
						<option value="none">Select Series if u need it</option>
						@foreach($series as $serie)
							<option value="{{ $serie->id }}">{{ $serie->title }}</option>
						@endforeach
					</select>
				</div>
				{!! Form::submit('Publish',['class'=>'btn btn-primary pull-left','style'=>'margin-right:10px;']) !!}
				<button class="btn btn-info" disabled>Save to Draft</button>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop