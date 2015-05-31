@extends('layouts.master')

@section('content')
	<div class="home">
		<div id="home-slider">
			<ul class="slideme">
				@foreach($pictures as $picture)
					<li>
						<div class="slider-title"><h1>{{ $picture->title }}</h1></div>
						<div class="slider-description">{{ $picture->description }}</div>
						<img src="assets/images/slider/{{ $picture->picture }}">
					</li>
				@endforeach
			</ul>
		</div>
		<div class="container">
			<div class="home-instagram">
				<h2>Instagram</h2>
				@foreach($instadata['data'] as $data)
					<div class="home-instagram-pic">
						<a href="{{ $data['link'] }}"><img src="{{ $data['images']['thumbnail']['url'] }}"></a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@stop
