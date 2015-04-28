@extends('layouts.master')

<!-- Sliders -->
@section('content')
	<div class="slider-page container">
		<!-- Buttons -->
		@if(isset(Auth::user()->id))
			<div class="slider-buttons">
				<a href="sliders/create" class="btn btn-primary">Add slider</a>
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
	    			<div class="slider col-md-6">
	    				<h1><b>{{ $slider->title }}</b></h1>
	    				<p><i>{{ date('d-m-Y H:i:s', strtotime($slider->created_at)) }}</i></p>
	    				<p>{{ $slider->description }}</p>
	    				<p><img style="width:200px" src="assets/images/slider/{{ $slider->picture }}"></p>
	    				@if(isset(Auth::user()->id))
		    				<div class="slider-post-buttons">
		    					<a href="sliders/edit/{{ $slider->id }}" class="btn btn-default">Edit</a>
			    				{{ Form::open(array('route' => array('slider.delete', $slider->id), 'method' => 'delete')) }}
			    					{{ Form::submit('Delete', array('class' => 'btn btn-danger')); }}
			    				{{ Form::close() }}
			    			</div>
			    		@endif
	    			</div>
	    		@endforeach
	    	</div>
    	@endif
    </div>
@stop
