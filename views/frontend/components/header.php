<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lam's Shoes</title>
    <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
    <script src="plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="public/OwlCarousel2/dist/assets/owl.carousel.min.css" />

    <link rel="stylesheet" href="../thietkewepLam/public/css/layout.css">
    <link rel="stylesheet" href="../thietkewepLam/public/css/spinner_css.css">
    <!-- <script src="../node_modules/jquery/dist/jquery.js"></script> -->
    <!-- <script src="../thietkewepLam/public/OwlCarousel2/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <style>

    </style>
</head>

<body class="bg ">
    <section class="dxl-header">
        <div class="container py-2 ">
            <div class="row">
                <div class="col-md-1 d-none d-md-block pt-3">
                    <a href="index.php?option=home">
                        <img class="img-fluid w-100%" src="public/images/logonike.png" alt="logo">
                    </a>
                </div>
                <div class="col-md-7 pt-3 pl-3 ">

                    <form action="index.php?option=search" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" id="search" placeholder="Search">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>

                    </form>
                </div>
                <div class="col-md-4 pt-2 text-center">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <?php if (isset($_SESSION['logincustomer'])) : ?>
                                <a href="index.php?option=userprofile&id=<?= $_SESSION['logincustomer_id']; ?>">
                                    <p class="p-0 m-0"> <i class="fa-regular fa-circle-user"></i></p>
                                    <p class="p-0 m-0">Profile</p>
                                </a>
                            <?php else : ?>
                                <a href="index.php?option=customer&f=login">
                                    <p class="p-0 m-0"> <i class="fa-regular fa-circle-user"></i></p>
                                    <p class="p-0 m-0">Profile</p>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-3">
                            <a href="#">
                                <p class="p-0 m-0"><i class="fa-regular fa-heart"></i></p>
                                <p class="p-0 m-0">Wish list</p>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <?php if (!isset($_SESSION['logincustomer'])) :
                            ?> <a href="index.php?option=customer&f=login">
                                    <p class="p-0 m-0"> <i class="fa-solid fa-bag-shopping"></i></p>
                                    <p class="p-0 m-0">Cart</p>
                                </a>
                            <?php else : ?>
                                <a href="index.php?option=cart-content&user_id=<?= $_SESSION['logincustomer_id']; ?>">
                                    <p class="p-0 m-0"> <i class="fa-solid fa-bag-shopping"></i></p>
                                    <p class="p-0 m-0">Cart</p>
                                </a>
                            <?php endif ?>
                        </div>
                        <div class="col-md-3">
                            <?php if (isset($_SESSION['logincustomer'])) : ?>
                                <a href="index.php?option=customer&f=logout">
                                    <p class="p-0 m-0"> <i class="fa-solid fa-right-from-bracket"></i></p>
                                    <p class="p-0 m-0">Log out</p>
                                </a>
                            <?php else : ?>
                                <a href="index.php?option=customer&f=login">
                                    <p class="p-0 m-0"> <i class="fa-solid fa-user-check"></i></p>
                                    <p class="p-0 m-0">Sign in</p>
                                </a>
                            <?php endif ?>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>