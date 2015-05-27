@extends('layouts.default')
@section('head')
	<meta property="og:title" content="{{ $serie->title }}">
	<meta property="og:image" content="{{ $serie->cover }}">
	<meta property="description" content="{{ $serie->description }}" >
@stop
@section('title',$serie->title)
@section('content')
<header class="cover" style="background:url('{{ $serie->cover }}') no-repeat center center fixed;height:500px;">
</header>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="page-header text-center">
					<h1>{{ $serie->title }}</h1>
				</div>
				<article class="text-center no-border">
					<p>{{ $serie->description }}</p>
				</article>
				<ul class="list-group ul-custom">
					@foreach($serie->stories as $item)
						<li class="list-group-item">
							<h4><a href="{{ URL::Route('story.show',$item->slug) }}">{{ $item->title }}</a></h4>
						</li>
					@endforeach
				</ul>	
			</div>
		</div>
	</div>
@stop