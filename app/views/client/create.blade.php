@extends('layouts.master')

@section('content')
	<div class="client-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($client, array('url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
		    	<div class="form-group">
			    	{{ Form::label('name', 'Name'); }}
			    	{{ Form::text('name', $client->name, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('name'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('description', 'Description'); }}
			    	{{ Form::textarea('description', $client->description, array('class' => 'form-control', 'id' => 'client-desc-editor')); }}
			    	@if(isset($errors)) {{ $errors->first('description'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('text', 'Text'); }}
			    	{{ Form::textarea('text', $client->text, array('class' => 'form-control', 'id' => 'client-text-editor')); }}
			    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('picture', 'Picture'); }}
			    	{{ Form::file('picture'); }}
			    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
			    </div>
		    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
