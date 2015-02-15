@extends('layouts.master')

@section('content')
	<div class="client-page">
		<div class="container">
			<!-- Buttons -->
			@if(isset(Auth::user()->id))
				<div class="client-buttons">
					<a href="clients/create">Add Client</a>
				</div>
			@endif
			<!-- No clients -->
	    	@if(empty($clients))
		    	<div class="noposts">
		    		<p>No clients found.</p>
		    	</div>
		    @endif
	    	<!-- All client posts -->
	    	@if(!empty($clients))
	    		<div class="clients">
		    		@foreach($clients as $client)
		    			<div class="client">
		    				<div class="client-picture"><img style="width:200px;" src="assets/images/client/{{ $client->picture }}" /></div>
		    				<h1><b>{{ $client->name }}</b></h1>
		    				<p><i>{{ date('d-m-Y H:i:s', strtotime($client->created_at)) }}</i></p>
		    				<p>{{ $client->description }}</p>
		    				@if(isset(Auth::user()->id))
			    				<div class="client-post-buttons">
			    					<a href="clients/edit/{{ $client->id }}">Edit</a>
				    				{{ Form::open(array('route' => array('client.delete', $client->id), 'method' => 'delete')) }}
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
