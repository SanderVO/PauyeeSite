@extends('layouts.master')

@section('content')
	<div class="blog">
		<div class="container">
			<!-- Buttons -->
			@if(isset(Auth::user()->id))
				<div class="blog-buttons">
					<a class="btn btn-primary" href="blog/create">Add Post</a>
				</div>
			@endif
	    	<!-- All blog posts -->
	    	@if(!empty($posts))
	    		<div class="blog-posts">
		    		@foreach($posts as $post)
		    			<div class="blog-post col-md-8">
		    				<div class="blog-picture"><img style="width:200px;" src="assets/images/blog/{{ $post->picture }}" /></div>
		    				<h1><b>{{ $post->title }}</b></h1>
		    				<p><i>By {{ $post->user->name }} on {{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}</i></p>
		    				<p>{{ $post->intro }}</p>
		    				<p>{{ $post->text }}</p>
		    				<p><a href="blog/{{ $post->id }}">Lees meer</a></p>
		    				@if(isset(Auth::user()->id))
			    				<div class="blog-post-buttons">
			    					<a class="btn btn-primary" href="blog/edit/{{ $post->id }}">Edit</a>
				    				{{ Form::open(array('route' => array('blog.delete', $post->id), 'method' => 'delete')) }}
				    					{{ Form::submit('Delete', array('class' => 'btn btn-danger')); }}
				    				{{ Form::close() }}
				    			</div>
				    		@endif
		    			</div>
		    		@endforeach
		    	</div>
	    	@endif
	    </div>
	</div>
@stop
