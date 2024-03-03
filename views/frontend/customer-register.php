<?php
require_once "../thietkewepLam/app/Models/User.php";
?>
<?php


use Application\Models\User;

require_once "../thietkewepLam/vendor/autoload.php";
require_once "../thietkewepLam/config/database.php";
?>

<?php
require_once('../thietkewepLam//views/frontend/header.php');

require_once('../thietkewepLam/views/frontend/mod-menu.php') ?>
<section class="maincontent">
    <form action="" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php require_once('../thietkewepLam/views/frontend/mod-sliderlogin.php') ?>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 pt-5 mt-3 mb-4 bg-light rounded-3 " style="box-shadow:7px 10px 5px gray;">
                    <h4 class=" text-center by-3 mb-2">Đăng Ký</h4>
                    
                        <div class="my-4 bt-4">
                            <label for="username" class="ms-1 mb-1">Tên Đăng Nhập</label>
                            <input type="text" required name="username" id="username" placeholder="Tên Đăng Nhập Hoặc Email" class="form-control">

                        </div>
                        <div class="my-4 bt-4">
                            <label for="password" class="ms-1 mb-1">Mật Khẩu</label>
                            <input type="password" required name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                        </div>
                        <div class="my-4 bt-4">
                            <label for="password" class="ms-1 mb-1">Xác Nhận Mật Khẩu</label>
                            <input type="password" required name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">
                        </div>
                        <div class="row">
                            <div class=" col-md-6  my-2">
                                <input type="submit" name="DANGKY" id="submit" class="btn btn-dark ms-1" value="Đăng Ký">
                            </div>

                            <div class="col-md-6 mb-1 text-end">
                                <!-- <a href="#">
                                    <p class="p-0 m-0 me-2">Quên mật khẩu?</p>
                                </a> -->
                                <a href="index.php?option=customer&f=login">
                                    <p class="p-0 me-2 m-1">Đăng Nhập</p>
                                </a>
                            </div>
                        </div>
                </div>


            </div>
        </div>
        </div>

    </form>
</section>