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
			<div class="home-youtube left">
				<h2>Youtube</h2>
				@foreach($youtubedata['items'] as $data)
					<div class="home-youtube-video">
						@if(isset($data['id']['videoId']))
							<iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $data['id']['videoId'] }}" frameborder="0" allowfullscreen></iframe>
						@endif
					</div>
				@endforeach
			</div>
		</div>
	</div>
@stop
