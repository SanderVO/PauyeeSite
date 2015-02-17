@extends('layouts.master')

@section('content')
	<div class="slider-page">
		<div class="container">
			<!-- Buttons -->
			@if(isset(Auth::user()->id))
				<div class="slider-buttons">
					<a href="sliders/create">Add slider</a>
				</div>
			@endif
			<!-- No sliders -->
	    	@if(empty($sliders))
		    	<div class="noposts">
		    		<p>No sliders found.</p>
		    	</div>
		    @endif
	    	<!-- All slider posts -->
	    	@if(!empty($sliders))
	    		<div class="sliders">
		    		@foreach($sliders as $slider)
		    			<div class="slider">
		    				<h1><b>{{ $slider->title }}</b></h1>
		    				<p><i>{{ date('d-m-Y H:i:s', strtotime($slider->created_at)) }}</i></p>
		    				<p>{{ $slider->description }}</p>
		    				<p><img style="width:200px" src="assets/images/slider/{{ $slider->picture }}"></p>
		    				@if(isset(Auth::user()->id))
			    				<div class="slider-post-buttons">
			    					<a href="sliders/edit/{{ $slider->id }}">Edit</a>
				    				{{ Form::open(array('route' => array('slider.delete', $slider->id), 'method' => 'delete')) }}
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
