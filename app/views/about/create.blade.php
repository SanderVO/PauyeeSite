@extends('layouts.master')

@section('content')
	<div class="about-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($about, array('url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
	    		<div class="form-group">
			    	{{ Form::label('text', 'Text'); }}
			    	{{ Form::textarea('text', $about->text, array('class' => 'form-control', 'id' => 'about-editor')); }}
			    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('picture', 'Picture'); }}
			    	<div class="about-picture"><img class="rounded-pic" src="{{ $about->picture }}" /></div>
			    	{{ Form::file('picture'); }}
			    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
			    </div>
		    	{{ Form::submit('Save', array('class' => 'btn btn-default')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
