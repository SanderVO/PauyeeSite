@extends('layouts.master')

@section('content')
	<div class="slider-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($slider, array('url' => $url, 'class' => 'left', 'files' => true, 'method' => $method)) }}
		    	{{ Form::label('title', 'Title'); }}
		    	{{ Form::text('title'); }}
		    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
		    	{{ Form::label('description', 'Description'); }}
		    	{{ Form::textarea('description'); }}
		    	@if(isset($errors)) {{ $errors->first('description'); }} @endif
		    	{{ Form::label('picture', 'Picture'); }}
		    	{{ Form::file('picture'); }}
		    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
		    	{{ Form::label('position', 'Position'); }}
		    	{{ Form::text('position'); }}
		    	@if(isset($errors)) {{ $errors->first('position'); }} @endif
		    	{{ Form::submit('Save'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
