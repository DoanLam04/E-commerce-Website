<?php
require_once "../thietkewepLam/vendor/autoload.php";
require_once "../thietkewepLam/config/database.php";
?>

<?php
require_once '../thietkewepLam//views/frontend/components/header.php';
require_once 'app/Controller/AuthController.php';

use Application\Authcontroller;

$auth = new AuthController();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['REGISTER'])) {
    $auth->register();
}
require_once '../thietkewepLam/views/frontend/components/mod-menu.php';


?>

<section class="maincontent">
    <form method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php require_once '../thietkewepLam/views/frontend/components/mod-sliderlogin.php' ?>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 pt-5 mt-3 mb-4 bg-light rounded-3 " style="box-shadow:7px 10px 5px gray;">
                    <h4 class=" text-center ">Sign Up</h4>
                    <div class="my-3">
                        <label for="name" class="ms-1 ">Họ và tên</label>
                        <input type="text" required name="name" id="name" placeholder="Your name" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="username" class="ms-1 ">Tên Đăng Nhập</label>
                        <input type="text" required name="username" id="username" placeholder="Username or Email" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="email" class="ms-1 ">Email</label>
                        <input type="text" required name="email" id="email" placeholder="Email" class="form-control">
                    </div>
                    <div class="my-3">
                        <label for="phone" class="ms-1 ">Phone</label>
                        <input type="text" required name="phone" id="phone" placeholder="Phone" class="form-control">
                    </div>
                    <div class="my-3 ">
                        <label for="password" class="ms-1 ">Mật Khẩu</label>
                        <input type="password" required name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                    </div>
                    <div class="my-3 ">
                        <!-- <label for="password" class="ms-1 ">Xác Nhận Mật Khẩu</label>
                        <input type="password" required name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                    </div> -->
                        <div class="row">
                            <div class=" col-md-6  my-2">
                                <input type="submit" name="REGISTER" id="submit" class="btn btn-dark ms-1" value="Register">
                            </div>

                            <div class="col-md-6 mb-1 text-end">

                                <a href="index.php?option=customer&f=login">
                                    <p class="pt-3 me-2 m-1">Đăng Nhập</p>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


    </form>
</section>