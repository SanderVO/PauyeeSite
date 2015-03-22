@extends('layouts.master')

@section('content')
	<div class="blog-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($blog, array('url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
		    	<div class="form-group">
			    	{{ Form::label('title', 'Title'); }}
			    	{{ Form::text('title', $blog->title, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
			    </div>
		    	<div class="form-group">
			    	{{ Form::label('intro', 'Intro'); }}
			    	{{ Form::text('intro', $blog->intro, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('intro'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('text', 'Text'); }}
			    	{{ Form::text('text', $blog->text, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('picture', 'Picture'); }}
			    	{{ Form::file('picture', array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
			    </div>
		    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
