@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="login col-md-6 col-md-offset-3">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::open(array('url' => 'login')) }}
		    	<div class="form-group">
			    	{{ Form::label('email', 'Email'); }}
			    	{{ Form::text('email', '', array('class' => 'form-control')); }}
			    </div>
			    <div class="form-group">
			    	{{ Form::label('password', 'Password'); }}
			    	{{ Form::password('password', array('class' => 'form-control')); }}
			    </div>
		    	{{ Form::submit('Login', array('class' => 'btn btn-info col-md-offset-5')); }}
	    	{{ Form::close() }}
	    </div>
    </div>
@stop
