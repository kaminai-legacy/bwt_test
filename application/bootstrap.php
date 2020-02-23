<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/vendor/autoload.php';

require_once $_SERVER["DOCUMENT_ROOT"] . '/application/constants.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/model.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/view.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/controller.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/application/core/route.php';
Route::start(); // запускаем маршрутизатор