<?php require_once "views/frontend/header.php" ?>
<?php require_once "app/Models/Product.php" ?>
<?php require_once "app/Models/Brand.php" ?>
<?php require_once "mod-menu.php" ?>
<?php require_once "mod-sliders.php" ?>
<?php

use Application\Models\Brand;
use Application\Models\Product;

$id = $_REQUEST['id'];
$brand = Brand::find($id);
$list_product = Product::where([['status', '=', 1], ['brand_id', '=', $id]])
    ->orderBy('id', 'DESC')->get();
?>
<section class="maincontent">
    <div class="container">
        <div class="row">
            <div class="col-md-3 bg-light">
                <div class="row">
                    <img class="img-fluid mt-3" src="../thietkewepLam/public/images/brand/<?= $brand->poster ?>.png" alt="<?= $brand->poster ?>">
                    <h4 class="mt-3 text-center"><?= $brand->name ?></h4>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row mt-3 ">
                    <?php foreach ($list_product as $item) : ?>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                            <img class="img-fluid " src="../thietkewepLam/public/images/products/<?= $item->image; ?>" alt="<?= $item->name; ?>">
                                        </a>
                                    </div>
                                    <div class="product-name py-1">
                                        <div class="row">
                                            <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                                <p class="fs-6 py-1"><?= $item->name; ?></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="prodcut-price">
                                        <div class="row">
                                            <div class="col-6 text-danger fs-5">
                                                <strong class="text-success"><?= $item->price; ?><sup>đ</sup></strong>
                                            </div>
                                            <div class="col-6 text-end">
                                                <del class="text-danger"><?= $item->price_sale; ?><sup>đ</sup></del>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-cart-hearth-eye my-2">
                                        <div class="row">
                                            <div class="col-6"></div>
                                            <div class="col-2">
                                                <a href="index.php?option=cart&addcat=<?= $item->id; ?>"> <button class="btn btn-sm fs-4 "> <i class="fa-solid fa-cart-plus"></i></button></a>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-sm fs-4 "><i class="fa-regular fa-heart"></i></button>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-sm  fs-4"><i class="fa-regular fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>

<?php require_once "views/frontend/footer.php" ?>