@extends('layouts.master')

@section('content')
	<div class="register">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::open(array('url' => 'register', 'class' => 'left')) }}
	    		<div class="form-group">
			    	{{ Form::label('name', 'Name'); }}
			    	{{ Form::text('name', '', array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('name'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('email', 'Email'); }}
			    	{{ Form::text('email', '', array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('email'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('password', 'Password'); }}
			    	{{ Form::password('password', array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('password'); }} @endif
			    </div>
			    <div class="form-group">
			    	{{ Form::label('password_confirmation', 'Password Confirmation'); }}
			    	{{ Form::password('password_confirmation', array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('password_confirmation'); }} @endif
			    </div>
		    	{{ Form::submit('Login', array('class' => 'btn btn-info')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
