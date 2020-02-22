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
		<link href="https://getbootstrap.com/docs/3.3/examples/justified-nav/justified-nav.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/product/">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
		<script src="/js/bootstrap/bootstrap.min.js"></script>
		<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
		<script src="/js/deep_search.js" type="text/javascript" defer></script>
		<script src="/js/validation.js" type="text/javascript" defer></script>
	</head>
	<body>

	<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm"
  style=<? if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) )
  {
    echo 'background-color:'. '#3e8ef7!important;color:'.'#fff;';
  }
  ?>
  >
	<h5 class="my-0 mr-md-auto font-weight-normal">BWT test</h5>
	<nav class="my-2 my-md-0 mr-md-3">
		<a class="p-2 text-dark bolder" href=<?= HOME_URL?>>Домашняя</a>
		<a class="p-2 text-dark bolder" href=<?= WEATHER_URL?>>Погода</a>
		<a class="p-2 text-dark bolder" href=<?= FEEDBACK_URL?>>Отзывы</a>
	</nav>
  <?php if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) ): ?>



    <!-- <div class="bolder">
      <?= "Привет, " . $_SESSION["user"]["name"]?>
    </div> -->

    <div class="dropdown dropleft">
      <div class="dropdown-toggle bolder"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?= "Привет, " . $_SESSION["user"]["name"]?>
      </div>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/logout">Выйти с аккаунта</a>
      </div>
    </div>




  <?php else: ?>
    <a class="btn btn-outline-primary" href=<?= AUTHORIZATION_URL?>>Авторизация</a>
  <?php endif; ?>
	</div>

 




	<!-- <div class="list-group">
		<a class="list-group-item list-group-item-action <?if($data->current_page==HOME_URL)echo 'active'?>" href=<?= HOME_URL?> >Домашняя</a>
		<a class="list-group-item list-group-item-action <?if($data->current_page==WEATHER_URL)echo 'active'?>" href=<?="/" . WEATHER_URL?> >Погода</a>
		<a class="list-group-item list-group-item-action <?if($data->current_page==FEEDBACK_URL)echo 'active'?>" href=<?="/" . FEEDBACK_URL?> >Отзывы</a>
	</div> -->

		<?php include 'application/views/'.$content_view;?>

		<footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          
          <small class="d-block mb-3 text-muted">© BWT test 2020—2020. Все права защищены.</small>
        </div>
        <div class="col-6 col-md">
          <h5>Features</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Cool stuff</a></li>
            <li><a class="text-muted" href="#">Random feature</a></li>
            <li><a class="text-muted" href="#">Team feature</a></li>
            <li><a class="text-muted" href="#">Stuff for developers</a></li>
            <li><a class="text-muted" href="#">Another one</a></li>
            <li><a class="text-muted" href="#">Last time</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Resource</a></li>
            <li><a class="text-muted" href="#">Resource name</a></li>
            <li><a class="text-muted" href="#">Another resource</a></li>
            <li><a class="text-muted" href="#">Final resource</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Resources</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Business</a></li>
            <li><a class="text-muted" href="#">Education</a></li>
            <li><a class="text-muted" href="#">Government</a></li>
            <li><a class="text-muted" href="#">Gaming</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>About</h5>
          <ul class="list-unstyled text-small">
            <li><a class="text-muted" href="#">Team</a></li>
            <li><a class="text-muted" href="#">Locations</a></li>
            <li><a class="text-muted" href="#">Privacy</a></li>
            <li><a class="text-muted" href="#">Terms</a></li>
          </ul>
        </div>
      </div>
    </footer>

	</body>
</html>