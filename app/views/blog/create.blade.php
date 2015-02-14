@extends('layouts.master')

@section('content')
	<div class="blog-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($blog, array('url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
		    	{{ Form::label('title', 'Title'); }}
		    	{{ Form::text('title'); }}
		    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
		    	{{ Form::label('intro', 'Intro'); }}
		    	{{ Form::text('intro'); }}
		    	@if(isset($errors)) {{ $errors->first('intro'); }} @endif
		    	{{ Form::label('text', 'Text'); }}
		    	{{ Form::text('text'); }}
		    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
		    	{{ Form::label('picture', 'Picture'); }}
		    	{{ Form::file('picture'); }}
		    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
		    	{{ Form::submit('Save'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
