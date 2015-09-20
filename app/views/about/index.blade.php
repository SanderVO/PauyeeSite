@extends('layouts.master')

<!-- About me -->
@section('content')
	<div class="about container col-md-6 col-md-offset-3">
		@if(isset($text))
			<div class="about-image">
				<img class="rounded-pic" src="assets/images/about/{{ $text->picture }}" />
			</div>
    		<div class="about-text">{{ $text->text }}</div>
    		<textarea id="about-text-editor">{{ $text->text }}</textarea>
    	@endif
		@if(isset(Auth::user()->id))
			<div class="about-buttons">
				@if(!isset($text))
					<a href="about/create" class="btn btn-default">Create</a>
				@endif
				@if(isset($text))
					<a id="edit-about-text" class="btn btn-default">Edit</a>
					<a id="cancel-about-text">Cancel</a>
					<a id="save-about-text">Save</a>
				@endif
			</div>
		@endif
    </div>
@stop
