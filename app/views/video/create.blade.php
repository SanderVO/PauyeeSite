@extends('layouts.master')

@section('content')
	<div class="video-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($video, array('url' => $url, 'class' => 'left', 'method' => $method)) }}
		    	<div class="form-group">
			    	{{ Form::label('title', 'Title'); }}
			    	{{ Form::text('title', $video->title, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('description', 'Description'); }}
			    	{{ Form::textarea('description', $video->description, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('description'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('url', 'URL'); }}
			    	{{ Form::text('url', $video->url, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('url'); }} @endif
			    </div>
		    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
