<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="ru" xmlns="http://www.w3.org/1999/xhtml">
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
    <script src="/js/manage_string_value_in_attribute.js" type="text/javascript" defer></script>
    <script src="/js/validation_rules.js" type="text/javascript" defer></script>
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
        <a class="p-2 text-dark bolder" href=<?= FEEDBACK_LIST_URL?>>Отзывы</a>
      </nav>
      <?php if ( ( !( empty($_SESSION["user"]) ) ) &&  ( isset($_SESSION["user"]) ) ): ?>
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
    <?php include 'application/views/'.$content_view;?>
    <hr/>
		<footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md">
          <small class="d-block mb-3 text-muted">© BWT test 2020—2020. Все права защищены.</small>
        </div>
        <div class="col-6 col-md">
          <h5>Наши контакты</h5>
          <ul class="list-unstyled text-small">
            <li><small class="d-block mb-3 text-muted">+88005553535</small></li>
            <li><small class="d-block mb-3 text-muted">bwt_test@gmail.com</small></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Наши партнеры</h5>
          <ul class="list-unstyled text-small">
            <li><small class="d-block mb-3 text-muted">Партнер 1</small></li>
            <li><small class="d-block mb-3 text-muted">Партнер 2</small></li>
          </ul>
        </div>
      </div>
    </footer>
	</body>
</html>