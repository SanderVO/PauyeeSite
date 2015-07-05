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
		<div class="home-about minvh maxvh">
			<div class="col-md-12 col-sm-12 col-xs-12 home-header about">
				<div class="col-lg-4 col-sm-4 col-md-4 col-xs-8 col-md-offset-4 col-sm-offset-4 col-xs-offset-2">
					<h2>About Me</h2>
				</div>
			</div>
			<div class="container">
				<div class="col-md-12">
					<div class="col-md-12"><img class="rounded-pic" src="{{ $about->picture }}" /></div>
					<p>{{ $about->text }}</p>
				</div>
			</div>
		</div>
		<div class="home-instagram minvh">
			<div class="col-md-12 col-sm-12 col-xs-12 home-header insta">
				<div class="col-sm-4 col-md-4 col-md-offset-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
					<h2>Instagram</h2>
				</div>
			</div>
			<div class="container">
				<div>
					<div class="home-insta-pics col-md-offset-1">
					@foreach($instadata as $data)
						<div class="home-instagram-pic">
							<a href="{{ $data['link'] }}"><img src="{{ $data['images']['thumbnail']['url'] }}"></a>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
