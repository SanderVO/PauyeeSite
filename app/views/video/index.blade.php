@extends('layouts.master')

@section('content')
	<div class="video-page">
	<!-- All video posts -->
		<div class="container">
			<div class="home-youtube col-md-12">
				@foreach($youtubedata['items'] as $data)
					<div class="home-youtube-video col-md-6">
						@if(isset($data['id']['videoId']))
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $data['id']['videoId'] }}" allowfullscreen></iframe>
						@endif
					</div>
				@endforeach
			</div>
	    </div>
	</div>
@stop
