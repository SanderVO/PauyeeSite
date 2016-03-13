@extends('layouts.master')

@section('content')
	<div class="home">

		<div id="home-slider" class="carousel slide maxvh" data-ride="carousel">
			@if(sizeof($pictures) > 0)
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
			@endif
		</div>
		
		@if(isset($about))
		<div class="home-block home-about">
			<div class="container">
				<div class="col-md-12 mrgntop-col">
					<div class="col-md-6 mrgntop-col mrgnbtn"><img class="rounded-pic" src="assets/images/about/{{ $about->picture }}" /></div>
					<div class="col-md-6 mrgntop-col mrgnbtn">
						<h2>About <span class="neon">Me</span></h2>
						<p>{{ $about->text }}</p>
					</div>
				</div>
			</div>
		</div>
		@endif

		<div class="home-block home-instagram minvh">
			<div class="container">
				<div>
					<h2>Insta<span class="neon">gram</span></h2>
					<div class="home-insta-pics col-xs-12 col-sm-12 col-md-12 mrgntop-col"></div>
				</div>
			</div>
		</div>

		<div class="home-block home-videos minvh">
			<div class="container">
				<h2 class="neon center">Videos</h2>
				<div class="videos">
					@foreach($youtubedata['items'] as $data)
						<div class="home-youtube-video col-md-6">
							<div class="col-md-12">
								@if(isset($data['id']['videoId']))
									<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $data['id']['videoId'] }}" allowfullscreen></iframe>
								@endif
							</div>
							<div class="col-md-12">
								<h3 class="neon">{{ $data['snippet']['title'] }}</h3>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

	</div>
@stop
