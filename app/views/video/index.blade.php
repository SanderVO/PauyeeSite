@extends('layouts.master')

@section('content')
	<div class="video-page">
		<div class="container">
			<!-- Buttons -->
			@if(isset(Auth::user()->id))
				<div class="video-buttons">
					<a class="btn btn-primary" href="videos/create">Add Video</a>
				</div>
			@endif
	    	<!-- All video posts -->
	    	@if(!empty($videos))
	    		<div class="videos">
		    		@foreach($videos as $video)
		    			<div class="video">
		    				<h1><b>{{ $video->title }}</b></h1>
		    				<p><i>{{ date('d-m-Y H:i:s', strtotime($video->created_at)) }}</i></p>
		    				<p>{{ $video->description }}</p>
		    				<p><embed width="420" height="315" src="{{ $video->url }}"></p>
		    				@if(isset(Auth::user()->id))
			    				<div class="video-post-buttons">
			    					<a href="videos/edit/{{ $video->id }}">Edit</a>
				    				{{ Form::open(array('route' => array('video.delete', $video->id), 'method' => 'delete')) }}
				    					{{ Form::submit('Delete'); }}
				    				{{ Form::close() }}
				    			</div>
				    		@endif
		    			</div>
		    		@endforeach
		    	</div>
	    	@endif
	    </div>
	</div>
@stop
