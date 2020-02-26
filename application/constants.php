<?
// Адреса старниц
define("DB_DRIVER","mysql");
define("DB_URL","localhost");
define("DB_NAME","bwt_test");
define("DB_LOGIN","mysql");
define("DB_PASSWORD","mysql");
define("DB_DSN",DB_DRIVER . ':dbname=' . DB_NAME . ';host=' . DB_URL);
define("URL",'http://'.$_SERVER['HTTP_HOST']);
define("WEATHER_URL","/weather");
define("FEEDBACK_URL","/feedback");
define("FEEDBACK_LIST_URL","/feedback/list/1");
define("HOME_URL","/");
define("AUTHORIZATION_URL","/authorization");
define("REGISTRATION_URL","/registration");
// Конфигурационные параметры
define("CITY_FOR_WEATHER_REQUEST","5093");
define("NUMBER_FEEDBACKS_FOR_PAGE",5);
define("NUMBER_FEEDBACKS_FOR_PAGINATION",5);
define('CAPTCHA_SESSION_VAR','CAPTCHA');
// Данные для страницы с погодой
define("LIST_OF_MONTHS",array(
    'Января',
	'Февраля',
	'Марта',
	'Апреля',
	'Мая',
	'Июня',
	'Июля',
	'Августа',
	'Сентября',
	'Октября',
	'Ноября',
    'Декабря',
));
