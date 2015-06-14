@extends('layouts.master')

@section('content')
	<div class="blog-create">
		<div class="container">
			@if(isset($message))
				<div class="message">{{ $message }}</div>
			@endif
	    	{{ Form::model($blog, array('id' => 'blog-form', 'url' => $url, 'files' => true, 'class' => 'left', 'method' => $method)) }}
			    <div class="form-group">
			    	{{ Form::label('picture', 'Foto', array('class' => 'left fullw')); }}
			    	<img class='col-md-4 blocks-pic' src='#' id='blog-pic' />
			    	{{ Form::file('picture', array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('picture'); }} @endif
			    </div>
		    	<div class="form-group">
			    	{{ Form::label('title', 'Titel'); }}
			    	{{ Form::text('title', $blog->title, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('title'); }} @endif
			    </div>
		    	<div class="form-group">
			    	{{ Form::label('intro', 'Intro'); }}
			    	{{ Form::textarea('intro', $blog->intro, array('class' => 'form-control')); }}
			    	@if(isset($errors)) {{ $errors->first('intro'); }} @endif
			    </div>
			    <div class="blog-blocks">
					@foreach($blocks as $key => $block)
						<hr>
						<div class="form-group">
					    	{{ Form::label('block-text', 'Block Tekst'); }}
					    	{{ Form::textarea("block[$key]['text']", $block->text, array('class' => 'form-control', 'id' => "block[$key]['text']")); }}
					    </div>
						@if($block->block_type == 'picture')
					    	<div>Foto</div>
					    	<img class="col-md-4 blocks-pic" src="assets/images/blocks/blog/{{ $block->picture }}" id="bpic{{ $key }}">
					    	{{ Form::file("block[$key]['picture']", array('class' => 'block-pic')) }}
					    	<div>Positie Foto</div>
					    	{{ Form::select("block[$key]['picture_pos']", array('left' => 'Links', 'right' => 'Rechts'), $block->picture_pos); }}
					    @endif
				    	{{ Form::hidden("block[$key]['type']", $block->block_type) }}
					@endforeach
				</div>
				<div class="blog-blocks-btns">
					<input type="button" class="btn btn-primary" onclick="newBlock('blog', 'text');" value="Niew Tekstblok">
					<input type="button" class="btn btn-primary" onclick="newBlock('blog', 'picture');" value="Nieuw Tekstblok met foto">
				</div>
		    	{{ Form::submit('Opslaan', array('class' => 'btn btn-success')); }}
	    	{{ Form::close() }}
	    </div>
	</div>
@stop
