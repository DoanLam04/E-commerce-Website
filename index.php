<?php
//Định nghĩa hàm
session_start();
define('MYWEB', 'wepdxl');

require_once "./vendor/autoload.php";
require_once "../thietkewepLam/config/database.php";
require_once "../thietkewepLam/app/Route.php";
require_once "../thietkewepLam/app/Main.php";
use Application\Route;

Route::route_site();
