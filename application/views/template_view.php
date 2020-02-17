<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>BWT test</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script src="/js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<link href="https://getbootstrap.com/docs/3.3/examples/justified-nav/justified-nav.css" rel="stylesheet">
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="/js/deep_search.js" type="text/javascript" defer></script>
		<script src="/js/validation.js" type="text/javascript" defer></script>
	</head>
	<body>
		
	<div class="container">	
	<div class="masthead">
        <h3 class="text-muted">BWT test</h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#">Projects</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Downloads</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </nav>
      </div>

		<div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
	</div>

	<form class="form">

		<div class="form-group">

			<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">User Name:</span>
			<input type="text" class="form-control" placeholder="Name" aria-describedby="basic-addon1" data-validation="name" name="name">
			</div>
			<div class="alert alert-danger" role="alert" id="name-error" class="input-error"></div>

			<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">User Forename:</span>
			<input type="text" class="form-control" placeholder="Forename" aria-describedby="basic-addon1" data-validation="forename" name="forename">
		
			</div>
			<div class="alert alert-danger" role="alert" id="forename-error" class="input-error"></div>

			<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">User email:</span>
			<input type="text" class="form-control" placeholder="Email" aria-describedby="basic-addon1" data-validation="email" name="email">
			
			</div>
			<div class="alert alert-danger" role="alert" id="email-error" class="input-error"></div>

			<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">User gender:</span>
				<select id="company" class="form-control" data-validation="gender" name="gender">
				<option value="male">male</option>
				<option value="female">female</option>
				<option value="" checked>not selected</option>
				</select> 	
			</div>
			<div class="alert alert-danger" role="alert" id="gender-error" class="input-error"></div>


			<div class="input-group">
				<label for="inputDate">User birthday:</label>
				<span><input type="date" class="form-control"  data-validation="birthday" name="birthday"></span>
				<div class="alert alert-danger" role="alert" id="birthday-error" class="input-error"></div>
			</div>

		</div>

	</form>



		<?php include 'application/views/'.$content_view; ?>


	</body>
</html>