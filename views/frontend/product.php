<?php require_once "views/frontend/header.php" ?>
<?php require_once "app/Models/Product.php" ?>
<?php require_once 'views/frontend/mod-menu.php' ?>

<?php

use Application\Models\Product;

$list_product = Product::where([['status', '=', 1]])
    ->get();
?>
<section class="maincontent">
    <div class="container bg-body-tertiary">
        <div class="row">
            <?php foreach ($list_product as $item) : ?>
                <div class="col-sm-3  bg-white gap-3">
                    <div class="row">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                    <img class="img-fluid " src="../thietkewepLam/public/images/products/<?= $item->image; ?>" alt="<?= $item->name; ?>">
                                </a>
                            </div>
                            <div class="product-name py-1 bg-white">
                                <div class="row">
                                    <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                        <p class="fs-6 ps-2 py-1"><?= $item->name; ?></p>
                                    </a>
                                </div>
                            </div>
                            <div class="prodcut-price bg-white">
                                <div class="row">
                                    <div class="col-6 text-danger fs-4 ps-3">
                                        <strong class="text-success"><?= $item->price; ?><sup>đ</sup></strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        <del class="text-danger"><?= $item->price_sale; ?><sup>đ</sup></del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-hearth-eye my-2 bg-white">
                                <div class="row bg-white">
                                    <div class="col-8"></div>
                                    <div class="col-2">
                                        <button class="btn btn-sm fs-4 "><i class="fa-regular fa-heart" style="color: red;"></i></button>
                                    </div>
                                    <div class="col-2">
                                        <a href="index.php?option=cart&addcat=<?= $item->id; ?>"> <button class="btn btn-sm fs-4 "> <i class="fa-solid fa-cart-plus"></i></button></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require_once "views/frontend/footer.php" ?>