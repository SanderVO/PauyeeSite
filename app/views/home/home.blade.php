@extends('layouts.master')

@section('content')
	<div class="home">

		<div id="home-slider" class="carousel slide maxvh" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				@foreach($pictures as $key => $picture)
					<li data-target="#home-slider" data-slide-to="{{ $key }}"></li>
				@endforeach
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner maxvh" role="listbox">
				@foreach($pictures as $key => $picture)
					@if($key == 0)
					    <div class="item active fullw">
							<div class="slider-text">
								<span>{{ $picture->title }}</span></br>
								<span class="txt-subt">{{ $picture->description }}</span>
							</div>
					     	<img class="slider-img" src="assets/images/slider/{{ $picture->picture }}" alt="{{ $picture->title }}">
					    </div>
					@endif
					@if($key > 0)
					    <div class="item fullw">
							<div class="slider-text">
								<span>{{ $picture->title }}</span></br>
								<span class="txt-subt">{{ $picture->description }}</span>
							</div>
					     	<img class="slider-img" src="assets/images/slider/{{ $picture->picture }}" alt="{{ $picture->title }}">
					    </div>
					@endif
				@endforeach
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

		<div class="home-about">
			<div class="container">
				<div class="col-md-12 mrgntop-col">
					<h2>About <span class="neon">Me</span></h2>
					<div class="col-md-12 mrgntop-col mrgnbtn"><img class="rounded-pic" src="{{ $about->picture }}" /></div>
					<p>{{ $about->text }}</p>
				</div>
			</div>
		</div>

		<div class="home-instagram minvh">
			<div class="container">
				<div>
					<h2>Insta<span class="neon">gram</span></h2>
					<div class="home-insta-pics col-md-offset-1 mrgntop-col">
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
