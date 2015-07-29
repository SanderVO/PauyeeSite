<!-- Master Layout -->
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Meta -->
		<base href="/">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pauyee Lim</title>

		<!-- CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/slideme.css">
		
		<!-- Import Libraries -->
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
		<script src="assets/js/jquery.slideme2.js"></script>
		<script src="assets/js/main.js"></script>

	</head>

    <body>
        @section('sidebar')
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        	<div class="container">
	        	<div class="navbar-header">
	        		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	        			<span class="icon-bar"></span>
	        		</button>
	        		<a href="#" class="navbar-brand">PYFitness</a>
	        	</div>
	        	<div class="navbar-collapse collapse">
	        		<ul class="nav navbar-nav navbar-right">
	        			<li><a href="about" class="navbar-link">About Me</a></li>
	        			<li><a href="clients" class="navbar-link">Clients</a></li>
	        			<li><a href="blog" class="navbar-link">Blog</a></li>
	        			<li><a href="videos" class="navbar-link">Videos</a></li>
						@if(isset(Auth::user()->id))
							<li><a href="sliders" class="navbar-link">Sliders</a></li>
						@endif
	        			<li><a href="contact" class="navbar-link">Contact</a></li>
	        		</ul>
				</div>
	        </div>
	    </nav>
        @show
        <div class="body">
            @yield('content')
        </div>
        @section('footer')
		<nav class="navbar footer navbar-default">
		  <div class="container">
		  	@if(!isset(Auth::user()->id))
		  		<p class="navbar-text navbar-left"><a href="login" class="navbar-link">Login</a></p>
		  	@else
				<p class="navbar-text navbar-left"><a href="logout" class="navbar-link">Logout</a></p>
			@endif
		    <p class="navbar-text navbar-right neon">Made by Sander</p>
		  </div>
		</nav>
    </body>

</html>