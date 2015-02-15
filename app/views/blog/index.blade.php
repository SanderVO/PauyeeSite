@extends('layouts.master')

@section('content')
	<div class="blog">
		<div class="container">
			<!-- Buttons -->
			@if(isset(Auth::user()->id))
				<div class="blog-buttons">
					<a href="blog/create">Create Blog</a>
				</div>
			@endif
			<!-- No posts -->
	    	@if(empty($posts))
		    	<div class="noposts">
		    		<p>No posts found.</p>
		    	</div>
		    @endif
	    	<!-- All blog posts -->
	    	@if(!empty($posts))
	    		<div class="blog-posts">
		    		@foreach($posts as $post)
		    			<div class="blog-post">
		    				<div class="blog-picture"><img style="width:200px;" src="assets/images/blog/{{ $post->picture }}" /></div>
		    				<h1><b>{{ $post->title }}</b></h1>
		    				<p><i>By {{ $post->user->name }} on {{ date('d-m-Y H:i:s', strtotime($post->created_at)) }}</i></p>
		    				<p>{{ $post->intro }}</p>
		    				<p>{{ $post->text }}</p>
		    				@if(isset(Auth::user()->id))
			    				<div class="blog-post-buttons">
			    					<a href="blog/edit/{{ $post->id }}">Edit</a>
				    				{{ Form::open(array('route' => array('blog.delete', $post->id), 'method' => 'delete')) }}
				    					{{ Form::submit('Delete'); }}
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
