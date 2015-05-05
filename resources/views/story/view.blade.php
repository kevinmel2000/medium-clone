@extends('layouts.default')
@section('head')
	{{-- expr --}}
@stop
@section('title',$story->title)
@section('content')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<header class="text-center">
				<div class="page-header">
					<h1>{{$story->title}}</h1>
				</div>
			</header>
			<article>
				{!! $story->content !!}
			</article>
		</div>
	</div>
@stop