@extends('layouts.master')

@section('content')

	<script src="assets/js/clients.js"></script>

	<div class="client-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($client, array('id' => 'client-form', 'url' => $url, 'files' => true, 'class' => 'col-md-8 col-md-offset-2', 'method' => $method)) }}
			    <div class="form-group">
			    	{{ Form::label('picture', 'Picture'); }}
			    	{{ Form::file('picture'); }}
			    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
			    </div>
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
			    <div class="client-blocks">
					@foreach($blocks as $key => $block)
						<hr>
						<div class="form-group">
					    	{{ Form::label('block-text', 'Block Tekst'); }}
					    	{{ Form::textarea("block[$key]['text']", $block->text, array('class' => 'form-control', 'id' => "block[$key]['text']")); }}
					    </div>
						@if($block->block_type == 'picture')
					    	<div>Foto</div>
					    	<img class="col-md-4" src="assets/images/blocks/client/{{ $block->picture }}" id="bpic{{ $key }}">
					    	{{ Form::file("block[$key]['picture']", array('class' => 'block-pic')) }}
					    	<div>Positie Foto</div>
					    	{{ Form::select("block[$key]['picture_pos']", array('left' => 'Links', 'right' => 'Rechts'), $block->picture_pos); }}
					    @endif
				    	{{ Form::hidden("block[$key]['type']", $block->block_type) }}
					@endforeach
				<div class="client-blocks-btns">
					<input type="button" class="btn btn-primary" onclick="newBlock('text');" value="Niew Textblok">
					<input type="button" class="btn btn-primary" onclick="newBlock('picture');" value="Nieuw Textblok met foto">
				</div>
		    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
