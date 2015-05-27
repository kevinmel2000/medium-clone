@extends('layouts.default')
@section('head')
	
@stop
@section('title','New Serie')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="page-header">
					<h1>New Series</h1>
				</div>
				{!! Form::open(['route'=>'series.store']) !!}
				{!! Form::hidden('bottime',time()) !!}
				{!! Form::text('cover','',['class'=>'form-control input-lg','placeholder'=>'Url cover image','required']) !!}
				{!! Form::text('title','',['class'=>'form-control input-lg','placeholder'=>'Title','required']) !!}
				{!! Form::textarea('description','',['class'=>'form-control input-lg','placeholder'=>'Description','required']) !!}
				{!! Form::submit('Save',['class'=>'btn btn-primary btn-block']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop