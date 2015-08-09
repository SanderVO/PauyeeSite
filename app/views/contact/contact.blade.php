@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="col-md-12 contact center">
			<div class="col-md-12">
				<h2 class="neon">Contact</h2>
				<div class="contact-text">
					Heb je vragen? Je kan altijd contact met mij opnemen via social media, of door middel van het onderstaande formulier in te vullen.
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				@if(isset($message))
					<div class="message">{{ $message }}</div>
				@endif
		    	{{ Form::open(array('url' => 'contact/send', 'class' => 'contact-form', 'method' => 'POST')) }}
			    	<div class="form-group">
				    	{{ Form::label('name', 'Name'); }}
				    	{{ Form::text('name', isset($data['name']) ? $data['name'] : '', array('class' => 'form-control')); }}
				    	@if(isset($error['name']['empty'])) {{ $error['name']['empty']; }} @endif
				    </div>
				    <div class="form-group">
				    	{{ Form::label('email', 'E-mail'); }}
				    	{{ Form::text('email', isset($data['email']) ? $data['email'] : '', array('class' => 'form-control')); }}
				    	@if(isset($error['email']['empty'])) {{ $error['email']['empty']; }} @endif
				    	@if(isset($error['email']['regex'])) {{ $error['email']['regex']; }} @endif
				    </div>
				    <div class="form-group">
				    	{{ Form::label('message', 'Bericht'); }}
				    	{{ Form::textarea('message', isset($data['message']) ? $data['message'] : '', array('class' => 'form-control')); }}
				    	@if(isset($error['message']['empty'])) {{ $error['message']['empty']; }} @endif
				    	@if(isset($error['message']['len'])) {{ $error['message']['len']; }} @endif
				    </div>
			    	{{ Form::submit('Verstuur', array('class' => 'btn btn-success')); }}
		    	{{ Form::close() }}
		    </div>
	    </div>
	</div>
@stop
