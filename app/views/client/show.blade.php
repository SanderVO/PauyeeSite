@extends('layouts.master')

@section('content')
	<div class="client-page container">
    	<!-- Client picture and text -->
		<div class="client-head col-md-8 col-md-offset-2">
			<div class="client-picture center">
				<img class="rounded-pic" src="assets/images/client/{{ $client->picture }}" />
			</div>
			<div class="client-name center">
				<h2>{{ $client->name }}</h2>
			</div>
		</div>
		<!-- Client text & reactions -->
		<div class="client-text col-md-10 col-md-offset-1">
			<div class="client-desc">
				{{ $client->description }}
			</div>
			<div class="client-text">
				{{ $client->text }}
			</div>
			<div class="client-reactions">
				<h3>Reactions</h3>
				@foreach($client->reactions as $react)
				<div class="client-reaction">
					<div class="reaction-name"><b>{{ $react->name }}</b></div>
					<div class="reaction-message">{{ $react->text }}</div>
				</div>
				@endforeach
			</div>
			<div class="client-reactions-make">
				<h3>Make Reaction</h3>
		    	{{ Form::model($reaction, array('url' => 'reactions/create', 'method' => 'POST')) }}
			    	<div class="form-group">
				    	{{ Form::label('name', 'Name'); }}
				    	{{ Form::text('name', $reaction->name, array('class' => 'form-control')); }}
				    	@if(isset($errors)) {{ $errors->first('name'); }} @endif
				    </div>
				    <div class="form-group">
				    	{{ Form::label('text', 'Message'); }}
				    	{{ Form::text('text', $reaction->text, array('class' => 'form-control')); }}
				    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
				    </div>
				    {{ Form::hidden('object', 'client') }}
				    {{ Form::hidden('object_id', $client->id) }}
			    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
		    	{{ Form::close() }}
			</div>
		</div>
    </div>
@stop