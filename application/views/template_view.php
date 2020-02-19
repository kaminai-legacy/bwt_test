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
		<link rel="stylesheet" href="css/weather-icons.min.css">
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
            <li <?if($data->current_page==HOME_URL)echo 'class="active"'?>><a href=<?= HOME_URL?> >Домашняя</a></li>
            <li <?if($data->current_page==WEATHER_URL)echo 'class="active"'?>><a href=<?="/" . WEATHER_URL?> >Погода</a></li>
            <li <?if($data->current_page==FEEDBACK_URL)echo 'class="active"'?>><a href=<?="/" . FEEDBACK_URL?> >Отзыв</a></li>
          </ul>
        </nav>
      </div>
	</div>


		<?php include 'application/views/'.$content_view; ?>

	</body>
</html>