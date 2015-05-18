@extends('layouts.default')
@section('head')
	{!! HTML::style('lib/font-awesome/css/font-awesome.min.css') !!}
@stop
@section('title','New Story')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="page-header text-center">
					<h1>{{ $user->name }} <small>Settings</small></h1>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						{!! Form::open(['route','story.store']) !!}
						<div class="form-group">
							<label for="username">Username</label>
							{!! Form::text('username',$user->username,['class'=>'form-control input-lg','placeholder'=>'username']) !!}
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							{!! Form::text('name',$user->name,['class'=>'form-control input-lg','placeholder'=>'Name']) !!}
						</div>
						<div class="form-group">
							<label for="quotes">Quotes</label>
							{!! Form::textarea('qoutes',$user->quotes,['class'=>'form-control input-lg','placeholder'=>'Quotes']) !!}
						</div>
						{!! Form::close() !!}	
					</div>
				</div>
			</div>
		</div>
	</div>
@stop