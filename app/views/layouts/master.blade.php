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
		<link rel="stylesheet" href="assets/css/main.min.css">
		<link rel="stylesheet" href="assets/css/slideme.css">
		
		<!-- Import Libraries -->
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.slideme2.js"></script>
		<script src="assets/js/main.js"></script>

	</head>

    <body>
        @section('sidebar')
        <div class="navbar">
        	<div class="container">
        		<div class="row left col-md-6">
        			<a href="/">Pauyee</a>
        		</div>
	            <ul class="row right col-md-6">
	            	<li class="col-md-2"><a href="about">About Me</a></li>
	            	<li class="col-md-2"><a href="clients">Clients</a></li>
	            	<li class="col-md-2"><a href="blog">Blog</a></li>
	            	<li class="col-md-2"><a href="videos">Videos</a></li>
	            	<li class="col-md-2"><a href="apparel">Apparel</a></li>
	            </ul>
	        </div>
	    </div>
        @show
        <div class="body">
            @yield('content')
        </div>
    </body>

</html>