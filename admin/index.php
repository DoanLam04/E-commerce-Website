<?php
session_start();
//Định nghĩa hàm
define('MYWEB', 'wepdxl');
if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
}
require_once '../vendor/autoload.php';
require_once '../config/database.php';
require_once '../app/Route.php';

use Application\Route;

Route::route_admin();
