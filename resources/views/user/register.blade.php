@extends('layouts.default')
@section('head')
	<meta name="description" content="Login to MediumClone">
@stop
@section('title','Register Medium Clone')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="page-header text-center">
					<h1>MediumClone</h1>
					<p>Register and create awesome story.</p>
				</div>
				<a href="{{ URL::Route('home') }}/socialize/facebook" class="btn btn-primary btn-block">Register with Facebook</a>
				<hr>
				{{--
				{!! Form::open(['route'=>'user.postRegister']) !!}
				<div class="form-group">
					<label for="username">Username</label>
					{!! Form::text('username','',['class'=>'form-control','required','placeholder'=>'ex : tonystark','required']) !!}
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					{!! Form::text('name','',['class'=>'form-control','required','placeholder'=>'ex : Tony Stark','required']) !!}
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					{!! Form::email('email','',['class'=>'form-control','required','placeholder'=>'ex : someone@domain.com']) !!}
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					{!! Form::password('password',['class'=>'form-control','required']) !!}
				</div>
				{!! Form::submit('Register',['class'=>'btn btn-warning btn-block']) !!}
				{!! Form::close() !!}
				<br>
				<b><a href="{{ URL::Route('user.login') }}">Already have account ?</a></b>
				--}}
			</div>
		</div>
	</div>
@stop