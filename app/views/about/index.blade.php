@extends('layouts.master')

<!-- About me -->
@section('content')
	<div class="about container col-md-6 col-md-offset-3">
		@if(isset($text))
			<div class="about-image"><img class="rounded-pic" src="{{ $text->picture }}" /></div>
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
@stop
