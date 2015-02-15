@extends('layouts.master')

@section('content')
	<div class="about-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($about, array('url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
		    	{{ Form::label('text', 'Text'); }}
		    	{{ Form::textarea('text'); }}
		    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
		    	{{ Form::label('picture', 'Picture'); }}
		    	{{ Form::file('picture'); }}
		    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
		    	{{ Form::submit('Save'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
