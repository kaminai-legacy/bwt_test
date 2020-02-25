<?php
//namespace Application;

use Route\Route as Route;
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';

require_once $_SERVER["DOCUMENT_ROOT"] . '/application/constants.php';

// spl_autoload_register(function ($class_name) {
//     $file = strtolower($class_name) . '.php';
//     echo $file;
//     require_once $file;
// });

require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/my_pdo.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/model.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/view.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/controller.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/route.php';
Route::start(); // запускаем маршрутизатор