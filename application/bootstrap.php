<?php 
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'lib/Calculator.php';
require_once 'lib/LogFile.php';
require_once 'lib/Login.php';
require_once 'lib/Messages.php';
require_once 'lib/Session.php';
require_once 'lib/DataEntryCheck.php';
$session = Session::getInstance();
Route::start(); // запускаем маршрутизатор
