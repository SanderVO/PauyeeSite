@extends('layouts.master')

@section('content')
	<div class="slider-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($slider, array('url' => $url, 'class' => 'left', 'files' => true, 'method' => $method)) }}
			    <div class="form-group">
			    	{{ Form::label('picture', 'Picture'); }}
			    	<div class="slider-picture"><img src="assets/images/slider/{{ $slider->picture }}" /></div>
			    	{{ Form::file('picture'); }}
			    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
			    </div>
	    		<div class="form-group">
			    	{{ Form::label('title', 'Title'); }}
			    	{{ Form::text('title', $slider->title, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('description', 'Description'); }}
			    	{{ Form::textarea('description', $slider->description, array('class' => 'form-control'); }}
			    	@if(isset($errors)) {{ $errors->first('description'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('position', 'Position'); }}
			    	{{ Form::text('position', $slider->position, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('position'); }} @endif
			    </div>
		    	{{ Form::submit('Save', array('class' => 'btn btn-default')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
