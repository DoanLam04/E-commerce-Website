<?php require_once "views/frontend/header.php" ?>
<?php require_once "app/Models/Product.php" ?>
<?php require_once "app/Models/Category.php" ?>
<?php require_once "mod-menu.php" ?>
<?php require_once "mod-sliders.php" ?>

<?php

use Application\Models\Product;
use Application\Models\Category;

$id = $_REQUEST['id'];
// $slug=$_REQUEST['slug'];
$category = Category::find($id);

$list_product = Product::where([['status', '!=', 0], ['category_id', '=', $id]])
    ->orderBy('product.created_at', 'DESC')->get();
?>
<section class="maincontent">
    <div class="container">
        <div class="row">
            <div class="col-md-3 bg-light">
                <h5 class="mt-4 text-center"><?= $category->name ?></h5>
            </div>
            <div class="col-md-9">
                <div class="row mt-3">
                    <?php foreach ($list_product as $item) : ?>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                            <img class="img-fluid " src="../thietkewepLam/public/images/products/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                        </a>
                                    </div>
                                    <div class="product-name py-1">
                                        <div class="row">
                                        <a href="index.php?option=product-detail&id=<?= $item->id; ?>"><p class="fs-6 py-1"><?= $item->name; ?></p></a>
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
                                            <div class="col-8">
                                                <a href="index.php?option=cart&addcat=<?= $item->id; ?>" class="btn btn-sm btn-secondary  form-control form-control"> Thêm vào giỏ</a>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-sm btn-info"><i class="fa-regular fa-heart"></i></button>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-sm btn-info"><i class="fa-regular fa-eye"></i></button>
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