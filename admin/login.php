<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body>
    <?php
    require_once "../vendor/autoload.php";
    require_once "../config/database.php";
    require_once "../app/Models/User.php";

    use Application\Models\User;

    $error = "";
    if (isset($_POST['DANGNHAP'])) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $args = [
            ['status', '=', 1],
            ['roles', '!=', 0],
            ['password', '=', $password]
        ];
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args[] = ['email', '=', $username];
        } else {
            $args[] = ['username', '=', $username];
        }
        $admin = User::where($args)->first();

        if ($admin == null) {
            $error = '<div class="text-danger">Username or password is not corrected</div>';
        } else {
            $_SESSION['user_id'] = $admin->id;
            $_SESSION['user_name'] = $admin->name;
            $_SESSION['user_image'] = $admin->image;
            header('location:index.php');
        }
    }
    ?>




    <!-- ------------------------------------------- -->
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row pt-5 d-flex align-items-center justify-content-center ">
                <div class="col-md-8 col-lg-7 col-xl-6 ">
                    <img src="../public/images/admin-login.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-4 col-xl-4 offset-xl-1 bg-light rounded-3" style="box-shadow:7px 10px 5px gray;">
                    <form action="login.php" method="post">
                        <!-- Email input -->
                        <h5 class=" text-center mt-4 by-3 mb-2">Login as Administrator</h5>
                        <div class="form-outline pt-4 mb-2">
                            <label class="form-label" for="username">Email address</label>
                            <input type="text" id="username" name="username" class="form-control form-control-lg fs-6" placeholder="Usernam or email" />

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg fs-6" placeholder="Your password" />
                        </div>
                        <?php if (strlen($error) > 0) : ?>
                            <div class="mb-3">
                                <?php echo $error; ?>
                            </div>
                        <?php endif ?>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                                <label class="form-check-label" for="form1Example3"> Remember me </label>
                            </div>
                            <a href="#!" class="fs-6" style="color: black;text-decoration: none;">Forgot password?</a>
                        </div>

                        <!-- Submit button -->

                        <button type="submit" name="DANGNHAP" class=" mb-4 fs-6 text-center btn btn-dark ms-1 btn-lg btn-block">Sign in</button>

                        <!-- <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                        </div>
                        <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
                            <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                        </a>
                        <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
                            <i class="fab fa-twitter me-2"></i>Continue with Twitter</a> -->
                    </form>
                </div>
            </div>
        </div>
    </section>


</body>

</html>