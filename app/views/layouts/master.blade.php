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
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
		<script src="assets/js/jquery.slideme2.js"></script>
		<script src="assets/js/main.js"></script>

	</head>

    <body>
        @section('sidebar')
        <nav class="navbar navbar-default navbar-fixed-top">
        	<div class="container">
        		<p class="navbar-text navbar-left"><a href="/" class="navbar-link">PYFitness</a></p>
        		<p class="navbar-text navbar-left"><a href="https://twitter.com/pauyeeee"><i class="fa fa-twitter"></i></a></p>
        		<p class="navbar-text navbar-left"><a href="https://www.facebook.com/pauyee.lim"><i class="fa fa-facebook"></i></a></p>
        		<p class="navbar-text navbar-left"><a href="https://instagram.com/pauyeefitness/"><i class="fa fa-instagram"></i></a></p>
        		<p class="navbar-text navbar-left"><a href="https://www.youtube.com/channel/UC4v7Xq5W45aAlnX8RaQRZ1g"><i class="fa fa-youtube-play"></i></a></p>

        		<p class="navbar-text navbar-right"><a href="apparel" class="navbar-link">Apparel</a></p>
        		<p class="navbar-text navbar-right"><a href="videos" class="navbar-link">Videos</a></p>
        		<p class="navbar-text navbar-right"><a href="blog" class="navbar-link">Blog</a></p>
        		<p class="navbar-text navbar-right"><a href="clients" class="navbar-link">Clients</a></p>
        		<p class="navbar-text navbar-right"><a href="about" class="navbar-link">About Me</a></p>
	        </div>
	    </nav>
        @show
        <div class="body">
            @yield('content')
        </div>
        @section('footer')
		<nav class="navbar footer navbar-default">
		  <div class="container">
		    <p class="navbar-text navbar-right">Made by Sander</p>
		  </div>
		</nav>
    </body>

</html>