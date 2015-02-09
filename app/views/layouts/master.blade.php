<!-- Master Layout -->
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Meta -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Pauyee Lim</title>

		<!-- Import Libraries -->
		<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

		<!-- CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

	</head>

    <body>
        @section('sidebar')
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
            	test
            	</div>
            </div>
        </div>
        @show
        <div class="container">
            @yield('content')
        </div>
    </body>

</html>