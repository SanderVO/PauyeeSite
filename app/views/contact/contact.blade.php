@extends('layouts.master')

@section('content')
	<div class="contact container">
		<h2>Contact</h2>
		<div class="contact-text">
			Heb je vragen? Je kan altijd contact met mij opnemen via social media, of door middel van het onderstaande formulier in te vullen.
		</div>
		@if(isset($message))
			<div class="message">{{ $message }}</div>
		@endif
    	{{ Form::open(array('url' => 'contact/send', 'class' => 'contact-form left', 'method' => 'POST')) }}
	    	<div class="form-group">
		    	{{ Form::label('name', 'Name'); }}
		    	{{ Form::text('name', '', array('class' => 'form-control')); }}
		    	@if(isset($error['name'])) {{ $error['name']['empty']; }} @endif
		    </div>
		    <div class="form-group">
		    	{{ Form::label('email', 'E-mail'); }}
		    	{{ Form::text('email', '', array('class' => 'form-control')); }}
		    	@if(isset($error['email'])) {{ $error['email']['empty']; }} @endif
		    </div>
		    <div class="form-group">
		    	{{ Form::label('message', 'Bericht'); }}
		    	{{ Form::textarea('message', '', array('class' => 'form-control')); }}
		    	@if(isset($error['message'])) {{ $error['message']['empty']; }} @endif
		    </div>
	    	{{ Form::submit('Verstuur', array('class' => 'btn btn-success')); }}
    	{{ Form::close() }}
	</div>
@stop
