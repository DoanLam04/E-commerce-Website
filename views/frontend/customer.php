<?php
require_once 'app/Controller/AuthController.php';

use Application\Authcontroller;

$auth = new Authcontroller();


$f = $_REQUEST['f'];
switch ($f) {
    case 'login': {
            require_once 'views/frontend/customer-login.php';
            break;
        }
    case 'logout': {
            $auth->logOut();
            break;
        }
    case 'register': {
            require_once 'views/frontend/customer-register.php';
            break;
        }
    case 'forgotten': {
            require_once 'views/frontend/customer-forgotten.php';
            break;
        }
    case 'profile': {
            require_once 'views/frontend/customer-profile.php';
            break;
        }
    default: {
            require_once 'views/frontend/error-404.php';
            break;
        }
}
