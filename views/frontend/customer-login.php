<?php
require_once "../thietkewepLam/app/Models/User.php";
?>

<?php


use Application\Models\User;

require_once "../thietkewepLam/vendor/autoload.php";
require_once "../thietkewepLam/config/database.php";

if (isset($_POST['DANGNHAP'])) {
    $message_alert = "";
    $username = $_POST['username'];
    $password = sha1($_POST['password']);


    $args = null;
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
        //email
        $args = [
            ['email', '=', $username],
            ['password', '=', $password],
            ['status', '=', 1]
        ];
    } else {
        $args = [
            ['username', '=', $username],
            ['password', '=', $password],
            ['status', '=', 1]
        ];
    }
    $user = User::where($args)->first();
    if ($user == null) {
        $message_alert = "Tai khoan hoac mat khau khong chinh xac";
    } else {
        $user->password == $password;
        $_SESSION['logincustomer'] = $username;
        $_SESSION['logincustomer_name'] = $user->name;
        $_SESSION['logincustomer_phone'] = $user->phone;
        $_SESSION['logincustomer_email'] = $user->email;
        $_SESSION['logincustomer_address'] = $user->address;
        $_SESSION['logincustomer_id'] = $user->id;
        $_SESSION['logincustomer_image'] = $user->image;


        $message_alert = "Đăng Nhập Thành Công";
        header('location:index.php?option=home');
    }
}
// $user = User::where('status', '=', 1)->first();
// $name = $user->name;
// $phone =  $user->phone;
// $email =  $user->email;
// $image =  $user->image;
// $id =  $user->id;
// $address = $user->address;


?>
<?php
require_once "../thietkewepLam//views/frontend/header.php";

require_once "../thietkewepLam/views/frontend/mod-menu.php" ?>
<section class="maincontent">
    <form action="index.php?option=customer&f=login" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php require_once "../thietkewepLam/views/frontend/mod-sliderlogin.php" ?>

                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 pt-5 mt-3 mb-4 bg-light rounded-3 " style="box-shadow:7px 10px 5px gray;">
                    <h4 class=" text-center by-3 mb-2">Đăng Nhập</h4>
                    <?php if (!isset($_SESSION['logincustomer'])) : ?>
                        <div class="my-4 bt-4">
                            <label for="username" class="ms-1 mb-1">Tên Đăng Nhập</label>
                            <input type="text" required name="username" id="username" placeholder="Tên Đăng Nhập Hoặc Email" class="form-control">

                        </div>
                        <div class="my-4 bt-4">
                            <label for="password" class="ms-1 mb-1">Mật Khẩu</label>
                            <input type="password" required name="password" id="password" placeholder="Nhập mật khẩu" class="form-control">

                        </div>
                        <div class="row">
                            <div class=" col-md-6  my-2">
                                <input type="submit" name="DANGNHAP" id="submit" class="btn btn-dark ms-1" value="Đăng Nhập">
                            </div>

                            <div class="col-md-6 mb-1 text-end">
                                <a href="index.php?option=customer&f=forgotten">
                                    <p class="p-0 me-2 m-1">Quên mật khẩu?</p>
                                </a>
                                <a href="index.php?option=customer&f=register">
                                    <p class=" p-0 me-2">Đăng kí</p>
                                </a>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="mb-3">
                            <div class="alert alert-info">
                                Bạn Đã Đăng Nhập
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
        </div>
        </div>

    </form>
</section>
<?php require_once  'views/frontend/footer.php' ?>