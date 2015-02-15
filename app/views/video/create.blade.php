@extends('layouts.master')

@section('content')
	<div class="video-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($video, array('url' => $url, 'class' => 'left', 'method' => $method)) }}
		    	{{ Form::label('title', 'Title'); }}
		    	{{ Form::text('title'); }}
		    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
		    	{{ Form::label('description', 'Description'); }}
		    	{{ Form::textarea('description'); }}
		    	@if(isset($errors)) {{ $errors->first('description'); }} @endif
		    	{{ Form::label('url', 'URL'); }}
		    	{{ Form::text('url'); }}
		    	@if(isset($errors)) {{ $errors->first('url'); }} @endif
		    	{{ Form::submit('Save'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
