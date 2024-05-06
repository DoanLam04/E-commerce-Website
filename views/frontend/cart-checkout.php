<?php require_once "./views/frontend/components/header.php" ?>
<!-- -----------------=---------------------------------------->
<?php require_once "./views/frontend/components/mod-menu.php" ?>
<!-- -----------------=---------------------------------------->
<?php require_once "app/Models/User.php" ?>
<?php require_once "app/Models/Product.php" ?>
<?php

use Application\Models\Product;
use Application\Models\User;

$user = User::find($_SESSION['logincustomer_id']);
$content_cart = null;
if (isset($_SESSION['contentcart'])) {
    $content_cart = $_SESSION['contentcart'];
}
?>
<form action="index.php?option=cart&checkoutCart=true" method="post">
    <section class="maincontent">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if ($content_cart != null) : ?>
                        <table class="table table-tripped table-hover">
                            <thead>
                                <tr>

                                    <th class="text-center" style="width:100px;">Hình</th>
                                    <th class="text-center" style="width: 300px;">Sản Phẩm</th>
                                    <th class="text-center" style="width:150px;">Giá</th>
                                    <th class="text-center" style="width:100px;">Sồ lượng</th>
                                    <th class="text-center" style="width:150px;">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total_money = 0; ?>
                                <?php foreach ($content_cart as $cart) : ?>
                                    <?php $product = Product::find($cart['id']); ?>
                                    <tr>

                                        <td> <img class="img-fluid " src="../thietkewepLam/public/images/products/<?= $product->image; ?>" alt="<?= $product->image; ?>"> </td>
                                        <td><?= $product->name; ?></td>
                                        <td class="text-center"><?= $cart['price']; ?></td>
                                        <td class="text-center"> <?= $cart['qty']; ?> </td>
                                        <td class="text-center"><?= $cart['amount']; ?></td>

                                    </tr>
                                    <?php $total_money += $cart['amount']; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h4> Chua có sản phẩm trong giỏ hàng</h4>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <div class="row text-center">
                        <h4>Thông tin đơn hàng</h4>
                    </div>
                    <div class="mb-2">
                        <input type="text" name="name" class="form-control" placeholder="Người nhận" value="<?= $user['name']; ?>" />
                    </div>
                    <div class="mb-2">
                        <input type="text" name="phone" class="form-control" placeholder="Diện Thoại" value="<?= $user['phone']; ?>" />
                    </div>
                    <div class="mb-2">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="<?= $user['address']; ?>" />
                    </div>
                    <div class="mb-2">
                        <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $user['name']; ?>" />
                    </div>
                    <div class="row text-end"><button class="btn" style="background-color: orangered;" type="submit">Thanh Toan</button></div>

                </div>
            </div>
            <div class="row">
                <div class="col-md3">
                    <a class="btn btn-info" href="index.php?option=cart&cart-content">Quay lại</a>
                </div>
                <div class="col-md3"></div>
                <div class="col-md3"></div>
                <div class="col-md3"></div>

            </div>

        </div>

    </section>
</form>

<!-- -----------------=---------------------------------------->
<?php require_once "./views/frontend/components/footer.php" ?>
<!-- -----------------=---------------------------------------->