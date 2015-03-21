@extends('layouts.master')

@section('content')
	<div class="clients-page container">
		<!-- Buttons -->
		@if(isset(Auth::user()->id))
			<div class="client-buttons">
				<a class="btn btn-primary" href="clients/create">Add Client</a>
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
	    			<div class="client col-md-6">
	    				<div class="client-picture center"><img class="rounded-pic" src="assets/images/client/{{ $client->picture }}" /></div>
	    				<h1><b><a href="clients/{{ $client->name_url }}">{{ $client->name }}</a></b></h1>
	    				<p><i>{{ date('d-m-Y H:i:s', strtotime($client->created_at)) }}</i></p>
	    				<p>{{ $client->description }}</p>
	    				@if(isset(Auth::user()->id))
		    				<div class="client-post-buttons">
		    					<a class="btn btn-default" href="clients/edit/{{ $client->id }}">Edit</a>
			    				{{ Form::open(array('route' => array('client.delete', $client->id), 'method' => 'delete', 'class' => 'left')) }}
			    					{{ Form::submit('Delete', array('class' => 'btn btn-danger')); }}
			    				{{ Form::close() }}
			    			</div>
			    		@endif
	    			</div>
	    		@endforeach
	    	</div>
    	@endif
    </div>
@stop
