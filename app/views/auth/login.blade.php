@extends('layouts.master')

@section('content')
	<div class="login">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::open(array('url' => 'auth/login')) }}
		    	{{ Form::label('email', 'Email'); }}
		    	{{ Form::text('email'); }}
		    	{{ Form::label('password', 'Password'); }}
		    	{{ Form::password('password'); }}
		    	{{ Form::submit('Login'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
