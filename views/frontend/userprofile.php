<?php
require_once "../thietkewepLam/app/Models/User.php";
?>
<?php
require_once "../thietkewepLam/vendor/autoload.php";
require_once "../thietkewepLam/config/database.php" ?>
<?php

use Application\Models\User;

$id = $_REQUEST['id'];
if (!isset($_SESSION['logincustomer'])) {
    header('location:index.php?option=customer&f=login');
} else {
    $user_row = User::where([['status', '=', 1], ['id', '=', $id]])->first();
}
?>



<?php require_once "../thietkewepLam/views/frontend/header.php" ?>
<?php require_once "../thietkewepLam/views/frontend/mod-menu.php" ?>
﻿

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="bg-light col-auto col-md-2 min-vh-100 border-end ">
            <div class="bg-light ">
                <a class="d-flex text-decoration-none mt-1 align-items-center text-dark">
                    <span class="fs-5 mt-2 d-none d-sm-inline text-start">Hồ Sơ</span>
                </a>
                <ul class="nav nav-pills flex-column mt-2">
                    <li class="nav-item">
                        <a href="index.php?option=userprofile&id=<?= $_SESSION['logincustomer_id']; ?>" class="nav-link" aria-current="page">
                            <i class="fa-regular fa-circle-user" style="color:black;"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Tài Khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="fa-regular fa-bell"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Thông Báo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?option=order" class="nav-link text-dark">
                            <i class="fa-regular fa-clipboard"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Đơn Mua</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?option=cart&cart-content" class="nav-link text-dark">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Giỏ Hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?option=customer&f=logout" class="nav-link text-dark">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Đăng Xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10 bg-light ">

            <div class="row ps-4 pt-3 pe-4">
                <div class="border-bottom">
                    <div class="fs-4">Hồ sơ của tôi</div>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-9">
                    <div class=" ps-4 ">
                        <div class="mt-4 ps-5">
                            <div class="row pb-4">
                                <div class="col-sm-3 text-end">Tên đăng nhập </div>
                                <div class="col-sm-2"><?= $user_row->username; ?></div>
                                <div class="col-sm-7"></div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-sm-3 text-end">Tên </div>
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" value="<?= $user_row->name; ?>" />
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-sm-3 text-end">Email</div>
                                <div class="col-sm-3"><?= $user_row->email; ?> </div>
                                <div class="col-sm-2 text-end"> <a href="#">Thay đổi</a> </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-sm-3 text-end">Số điện thoại</div>
                                <div class="col-sm-3"><?= $user_row->phone; ?> </div>
                                <div class="col-sm-2 text-end"> <a href="#">Thay đổi</a> </div>
                                <div class="col-sm-4"></div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-sm-3 text-end">Giới tính</div>
                                <div class="col-sm-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label " for="inlineRadio1">Nam</label>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Khác</label></label>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div>
                        <div class="btn btn-dark ms-5 fs-6">Lưu</div>
                    </div>
                </div>
                <div class="col-md-3 bg-light">
                    <div class="row border-start mt-4">
                        <div class="">
                            <img src="../thietkewepLam/public/images/users/<?= $user_row->image; ?>" alt="<?php $user_row->name; ?>" class="img-circle elevation-2 img-fluid mt-3 ms-5" style="width: 100px;">

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<div class="mb-4"></div>
<?php require_once "views/frontend/footer.php" ?>