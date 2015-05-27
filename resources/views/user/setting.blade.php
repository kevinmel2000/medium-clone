@extends('layouts.default')
@section('head')
	{!! HTML::style('lib/font-awesome/css/font-awesome.min.css') !!}
	{!! HTML::script('lib/angular/angular.min.js') !!}
	{!! HTML::script('assets/js/username.js') !!}
@stop
@section('title','Settings')
@section('content')
	<div class="container" ng-app="setting">
		<div class="row" ng-controller="myController">
			<div class="col-md-8 col-md-offset-2">
				<div class="page-header text-center">
					<h1>{{ $user->name }} <small>Settings</small></h1>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						{!! Form::open(['route'=>'user.savesetting']) !!}
						<div class="form-group">
							{!! Form::hidden('id',$user->id) !!}
							<label for="username">Username</label>
							<input type="text" class="form-control input-lg" disabled value="{{$user->username}}">
							{!! Form::text('username','',['class'=>'form-control input-lg','placeholder'=>'ganti username','ng-model'=>'username','ng-change'=>'validate()']) !!}
						</div>
						<p class="[[ class ]]" role="alert">
						  [[ status ]]
						</p>
						<div class="form-group">
							<label for="name">Name</label>
							{!! Form::text('name',$user->name,['class'=>'form-control input-lg','placeholder'=>'Name']) !!}
						</div>
						<div class="form-group">
							<label for="quotes">Quotes</label>
							{!! Form::textarea('quotes',$user->quotes,['class'=>'form-control input-lg','placeholder'=>'Quotes','required']) !!}
						</div>
						{!! Form::submit('Save',['class'=>'btn btn-primary btn-block']) !!}
						{!! Form::close() !!}	
					</div>
				</div>
			</div>
		</div>
	</div>
@stop