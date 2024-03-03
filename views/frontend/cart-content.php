<?php require_once "header.php" ?>
<!-- -----------------=---------------------------------------->
<?php require_once "mod-menu.php" ?>
<!-- -----------------=---------------------------------------->
<?php require_once "app/Models/Product.php" ?>
<?php

use Application\Models\Product;

$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}

?>
<section>
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1 d-none d-md-block ms-3 pt-3 ps-5 fs-5">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="col-md-3">
                            <h5 class="text-center mt-3 pe-5 me-5">Giỏ hàng</h5>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row" style="height:10px;"></div>
                    <form action="index.php?option=cart" method="post">
                        <div class="card-body bg-light">
                            <?php if ($content_cart != null) : ?>
                                <table class="table table-tripped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-center" style="width:50px;">Hình</td>
                                            <td class="text-center" style="width:200px;">Tên</td>
                                            <td class="text-center" style="width:50px;">Trị giá</td>
                                            <td class="text-center" style="width:50px;">Sồ lượng</td>
                                            <td class="text-center" style="width:50px;">Thành Tiền</td>
                                            <td class="text-center" style="width:50px;">xóa</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total_money = 0; ?>
                                        <?php foreach ($content_cart as $cart) : ?>
                                            <?php $product = Product::find($cart['id']); ?>
                                            <tr>

                                                <td style="width: 100; height:100;">
                                                    <img class="img-fluid " src="../thietkewepLam/public/images/products/<?= $product->image; ?>" alt="<?= $product->image; ?>">
                                                </td>
                                                <td><?= $product->name; ?></td>
                                                <td class="text-center"><?= $cart['price']; ?></td>
                                                <!-- -----------------=---------------------------------------->
                                                <td class="text-center" style="width:50px;">
                                                    <input class=" text-center" id="output" style="width:50px;" type="number" name="qty[<?= $cart['id']; ?>]" value="<?= $cart['qty']; ?>">
                                                </td>
                                                <!-- -----------------=---------------------------------------->
                                                <td class="text-center"> <?= $cart['amount']; ?></td>
                                                <td class="text-center">
                                                    <a class="text-center btn btn-sm btn-danger" href="index.php?option=cart&delcart=<?= $cart['id']; ?>">
                                                        <i class="fas fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $total_money += $cart['amount']; ?>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="4">
                                                <a class="text-center btn btn-sm btn-danger" href="index.php?option=cart&delcart=all">
                                                    Xóa Tát cả
                                                </a>
                                                <input class="btn btn-sm btn-info" value="Cập nhật" type="submit" name="updateCart" />
                                                <a class="btn btn-sm btn-success" href="index.php?option=cart&checkout=true">Thanh Toán</a>
                                            </td>
                                            <td colspan="3" class="text-end"><strong>
                                                    Tổng Tiền:<?= $total_money . "vnd"; ?>
                                                </strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <h4> Chua có sản phẩm trong giỏ hàng</h4>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>







<!-- -----------------=---------------------------------------->
<?php require_once "footer.php" ?>
<!-- -----------------=---------------------------------------->