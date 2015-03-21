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
		<div>
			test
		</div>
	</div>
@stop
