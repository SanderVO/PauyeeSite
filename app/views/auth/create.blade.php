@extends('layouts.master')

@section('content')
	<div class="register">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::open(array('url' => 'auth/register', 'class' => 'left')) }}
		    	{{ Form::label('name', 'Name'); }}
		    	{{ Form::text('name'); }}
		    	@if(isset($errors)) {{ $errors->first('name'); }} @endif
		    	{{ Form::label('email', 'Email'); }}
		    	{{ Form::text('email'); }}
		    	@if(isset($errors)) {{ $errors->first('email'); }} @endif
		    	{{ Form::label('password', 'Password'); }}
		    	{{ Form::password('password'); }}
		    	@if(isset($errors)) {{ $errors->first('password'); }} @endif
		    	{{ Form::label('password_confirmation', 'Password Confirmation'); }}
		    	{{ Form::password('password_confirmation'); }}
		    	@if(isset($errors)) {{ $errors->first('password_confirmation'); }} @endif
		    	{{ Form::submit('Login'); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
