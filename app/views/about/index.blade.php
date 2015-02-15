@extends('layouts.master')

<!-- About me -->
@section('content')
	<div class="about">
		<div class="container">
			<h1>About Me</h1>
			@if(isset($text))
				<div class="about-image"><img style="width:200px;" src="assets/images/about/{{ $text->picture }}" /></div>
	    		<div class="about-text">{{ $text->text }}</div>
	    	@endif
			@if(isset(Auth::user()->id))
				<div class="about-buttons">
					@if(!isset($text))
						<a href="about/create">Create</a>
					@endif
					@if(isset($text))
						<a href="about/edit/{{ $text->id }}">Edit</a>
					@endif
    			</div>
    		@endif
	    </div>
	</div>
@stop
