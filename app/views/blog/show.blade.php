@extends('layouts.master')

@section('content')
	<div class="blog-page mrgnbtn container">
    	<!-- blog picture and text -->
		<div class="blog-head col-md-8 col-md-offset-2">
			<div class="blog-picture center">
				<img class="rounded-pic" src="assets/images/blog/{{ $post->picture }}" />
			</div>
			<div class="blog-name center">
				<h2 class="neon">{{ $post->title }}</h2>
			</div>
		</div>
		<!-- blog text & reactions -->
		<div class="blog-text col-md-12">
			<div class="blog-desc col-md-12">
				<p><b>{{ $post->intro }}</b></p>
			</div>
			<div class="blog-blocks col-md-12">
				@foreach($post->blocks as $key => $block)
					<div class="blog-block left">
						<p>
							@if($block->block_type == 'picture')
								<div class="blog-picture">
									{{ HTML::image('assets/images/blocks/blog/' . $block->picture, '', array('id' => $key, 'class' => 'col-md-3 ' . $block->picture_pos)) }}
								</div>
							@endif
							{{ $block->text }}
						</p>
					</div>
				@endforeach
			</div>
			<div class="reactions col-md-12">
				<h3 class="neon">Reactions</h3>
				@foreach($post->reactions as $react)
				<div class="reaction">
					<div class="reaction-name"><b>{{ $react->name }}</b></div>
					<div class="reaction-message">{{ $react->text }}</div>
				</div>
				@endforeach
			</div>
			<div class="reactions-make col-md-12">
		    	{{ Form::model($reaction, array('url' => 'reactions/create', 'method' => 'POST')) }}
			    	<div class="form-group">
				    	{{ Form::label('name', 'Name'); }}
				    	{{ Form::text('name', $reaction->name, array('class' => 'form-control')); }}
				    	@if(isset($errors)) {{ $errors->first('name'); }} @endif
				    </div>
				    <div class="form-group">
				    	{{ Form::label('text', 'Message'); }}
				    	{{ Form::textarea('text', $reaction->text, array('class' => 'form-control')); }}
				    	@if(isset($errors)) {{ $errors->first('text'); }} @endif
				    </div>
				    {{ Form::hidden('object', 'blog') }}
				    {{ Form::hidden('object_id', $post->id) }}
				    {{ Form::hidden('redirect', 'blog/'.$post->id) }}
			    	{{ Form::submit('Save', array('class' => 'btn btn-success')); }}
		    	{{ Form::close() }}
			</div>
		</div>
    </div>
@stop
