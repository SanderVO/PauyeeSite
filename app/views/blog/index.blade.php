@extends('layouts.master')

@section('content')
	<div class="blog container">
    	<!-- All blog posts -->
    	@if(!empty($posts))
    		<div class="blog-posts col-md-8 col-md-offset-2">
	    		@foreach($posts as $post)
	    			<div class="blog-post col-md-8">
	    				<div class="blog-picture"><img style="width:200px;" src="assets/images/blog/{{ $post->picture }}" /></div>
	    				<a class="neon" href="blog/{{ $post->id }}"><h1 class="neon"><b>{{ $post->title }}</b></h1></a>
	    				<p><i>By {{ $post->user->name }} on {{ date('d-m-Y', strtotime($post->created_at)) }}</i></p>
	    				<p>{{ $post->intro }}</p>
	    				<p>{{ $post->text }}</p>
	    				<p><a class="neon" href="blog/{{ $post->id }}">Lees meer</a></p>
	    				@if(isset(Auth::user()->id))
		    				<div class="blog-post-buttons">
		    					<a class="btn btn-primary col-md-2" href="blog/edit/{{ $post->id }}">Edit</a>
			    				{{ Form::open(array('route' => array('blog.delete', $post->id), 'method' => 'delete', 'class' => 'col-md-2')) }}
			    					{{ Form::submit('Delete', array('class' => 'btn btn-danger')); }}
			    				{{ Form::close() }}
			    			</div>
			    		@endif
	    			</div>
	    		@endforeach
	    	</div>
    	@endif
    	<!-- Dates -->
		<div class="blog-dates col-md-2">
			<!-- Buttons -->
			@if(isset(Auth::user()->id))
				<div class="blog-buttons">
					<a class="btn btn-primary" href="blog/create">Add Post</a>
				</div>
			@endif
			<h1 class="neon">Archive</h1>
    		@foreach($dates as $key => $date)
				<div class="blog-year">
					<h3>{{ $key }}</h2>
					@foreach($date as $key2 => $month)
						<div class="blog-month">
							<h4 class="neon" onclick="showPosts(this)">{{ $key2 }}</h3>
							<div class="blog-date-posts">
								@foreach($month as $key3 => $blog)
									<a href="/blog/{{ $blog->id }}">{{ $blog->title }}</a>
								@endforeach
							</div>
						</div>
					@endforeach
				</div>
    		@endforeach
    	</div>
	</div>
@stop
