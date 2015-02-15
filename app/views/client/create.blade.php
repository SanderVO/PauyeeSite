@extends('layouts.master')

@section('content')
	<div class="client-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($client, array('url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
		    	{{ Form::label('name', 'Name'); }}
		    	{{ Form::text('name'); }}
		    	@if(isset($errors)) {{ $errors->first('name'); }} @endif
		    	{{ Form::label('description', 'Description'); }}
		    	{{ Form::textarea('description'); }}
		    	@if(isset($errors)) {{ $errors->first('description'); }} @endif
		    	{{ Form::label('picture', 'Picture'); }}
		    	{{ Form::file('picture'); }}
		    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
		    	{{ Form::submit('Save'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
