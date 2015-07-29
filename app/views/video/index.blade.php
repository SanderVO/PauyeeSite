@extends('layouts.master')

@section('content')
	<div class="video-page">
	<!-- All video posts -->
		<div class="container">
			<div class="home-youtube col-md-12 mrgnbtn">
				<h2 class="neon center">Latest videos</h2>
				<div class="mrgntop">
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
