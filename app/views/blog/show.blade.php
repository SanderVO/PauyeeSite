@extends('layouts.master')

@section('content')
	<div class="client-page container">
    	<!-- Client picture and text -->
		<div class="client-head col-md-8 col-md-offset-2">
			<div class="client-picture center">
				<img class="rounded-pic" src="assets/images/blog/{{ $post->picture }}" />
			</div>
			<div class="client-name center">
				<h2>{{ $post->title }}</h2>
			</div>
		</div>
		<!-- Client text & reactions -->
		<div class="client-text col-md-10 col-md-offset-1">
			<div class="client-desc">
				<p>{{ $post->intro }}</p>
			</div>
			<div class="client-blocks">
				@foreach($post->blocks as $key => $block)
					<div class="client-block left">
						<p>
							@if($block->block_type == 'picture')
								<div class="client-picture">
									{{ HTML::image('assets/images/blocks/blog/' . $block->picture, '', array('id' => $key, 'class' => 'col-md-3 ' . $block->picture_pos)) }}
								</div>
							@endif
							{{ $block->text }}
						</p>
					</div>
				@endforeach
			</div>
			<div class="client-reactions">
				<h3>Reactions</h3>
				@foreach($post->reactions as $react)
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
				    {{ Form::hidden('object_id', $post->id) }}
			    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
		    	{{ Form::close() }}
			</div>
		</div>
    </div>
@stop
