@extends('layouts.default')
@section('head')
	<meta name="description" content="Login to MediumClone">
@stop
@section('title','Login Medium Clone')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
				<div class="page-header text-center">
					<h1>MediumClone</h1>
					<p>Login and create awesome story.</p>
				</div>
				{!! Form::open(['route'=>'user.postLogin']) !!}
				<div class="form-group">
					<label for="email">Email</label>
					{!! Form::email('email','',['class'=>'form-control','required','placeholder'=>'ex : someone@domain.com']) !!}
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					{!! Form::password('password',['class'=>'form-control','required']) !!}
				</div>
				<div class="checkout">
					<label for="rememberMe">
						<input type="checkbox" name="rememberMe" checked="true"> Remember Me ?
					</label>
				</div>
				{!! Form::submit('Log In',['class'=>'btn btn-primary btn-block']) !!}
				{!! Form::close() !!}
				<br>
				<b><a href="{{ URL::Route('user.register') }}">Don't have account yet ?</a></b>
			</div>
		</div>
	</div>
@stop