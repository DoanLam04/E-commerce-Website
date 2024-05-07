<?php
require_once './app/Library/MyClass.php';
require_once './app/Controller/AuthController.php';
require_once "../thietkewepLam/vendor/autoload.php";
require_once "../thietkewepLam/config/database.php";


?>

<?php

use Application\Libraries\MyClass;
use Application\Authcontroller;

$auth = new Authcontroller();

if (isset($_POST['LOGIN'])) {
    $auth->logIn();
}
?>
<?php
require_once "../thietkewepLam//views/frontend/components/header.php";

?>
<style>
    .field {
        position: relative;
    }

    .field #password+i {
        position: absolute;
        right: 20px;
        top: 72%;
        color: #ccc;
        cursor: pointer;
        transform: translateY(-50%);
    }

    .field #password+i.active:before {
        color: #333;
        content: "\f070";
    }
</style>
<section class="maincontent">
    <form action="index.php?option=customer&f=login" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php require_once "../thietkewepLam/views/frontend/components/mod-sliderlogin.php" ?>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 pt-5 mt-3 mb-4 bg-light rounded-3 " style="box-shadow:7px 10px 5px gray;">

                    <h4 class=" text-center by-3 mb-2">Log In</h4>
                    <?php if (!isset($_SESSION['logincustomer'])) : ?>
                        <div class="my-4 bt-4">
                            <label for="username" class="ms-1 mb-1">Username</label>
                            <input type="text" required name="username" id="username" placeholder="Username or email" class="form-control">

                        </div>
                        <div class="field my-4 bt-4">
                            <label for="password" class="ms-1 mb-1">Password</label>
                            <input type="password" required name="password" id="password" placeholder="Password" class="form-control">
                            <i class="fas fa-eye"></i>
                        </div>
                        <?php
                        // Kiểm tra xem đã có thông báo được thiết lập hay chưa
                        if (MyClass::exists_flash('message')) {
                            $message = MyClass::get_flash('message');
                            // Hiển thị thông báo
                            echo '<div id="Alert" class="alert alert-' . $message['type'] . '">' . $message['msg'] . '</div>
                                            <script>
                                            setTimeout(function() {
                                                document.getElementById("Alert").style.display="none";
                                            },3000);
                                            </script>        
                                            ';
                        }
                        ?>
                        <div class="row">
                            <div class=" col-md-6  my-2">
                                <input type="submit" name="LOGIN" id="submit" class="btn btn-dark ms-1" value="Log in">
                            </div>

                            <div class="col-md-6 mb-1 text-end">
                                <a href="index.php?option=customer&f=forgotten">
                                    <p class="p-0 me-2 m-1">Forgot password? </p>
                                </a>
                                <a href="index.php?option=customer&f=register">
                                    <p class=" p-0 me-2">Sign up</p>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
    <script src="../thietkewepLam/public/js/password-event.js"></script>
</section>
<?php require_once  'views/frontend/components/footer.php' ?>