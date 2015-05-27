@extends('layouts.default')
@section('head')
	
@stop
@section('title','Series')
@section('content')
	<div class="container">
		<div class="page-header text-center">
			<h1>Explore Series</h1>
		</div>
		@foreach(array_chunk($series->all(),3) as $row)
			<div class="row">
				@foreach($row as $item)
					<figure class="col-md-4 text-center">
						<a class="article" href="{{ URL::Route('series.show',$item->slug) }}">
						<div class="cover" style="background:url('{{ $item->cover }}') no-repeat center center; height:200px;border-radius:10px;"></div>
						<img class="img-circle" style="max-width:80px;margin-top:-70px;" src="{{ URL::Route('home') }}/images/{{ $item->user->profilePicture }}" alt="{{ $item->user->name }}">
						<h3>{{ $item->title }}</h3>
						</a>
					</figure>
				@endforeach
			</div>
		@endforeach
	</div>
@stop