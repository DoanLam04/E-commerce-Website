<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<?php require_once "views/frontend/components/header.php" ?>
<?php require_once "app/Models/Product.php" ?>
<?php require_once "app/Models/Product_image.php" ?>
<?php require_once 'views/frontend/components/mod-menu.php' ?>
<?php

use Application\Models\Product;
use Application\Models\Product_image;


$id = $_REQUEST['id'];
$list_product = Product::find($id);
$list_images = Product_image::where('product-id', '=', $id)
    ->get(); // Lấy tất cả các hình ảnh có product-id tương ứng với id của sản phẩm

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <?php foreach ($list_images as $image) : ?>
                        <div class="col-md-6">
                            <img src="../thietkewepLam/public/images/products/<?= $image->url; ?>" alt="Product" class="img-thumbnail">
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>
            <div class="col-md-6">
                <h2><?= $list_product->name; ?></h2>
                <div class="row">
                    <div class="col-6 text-danger fs-5">
                        <strong class="text-success"><?= $list_product->price; ?><sup>đ</sup></strong>
                    </div>
                    <div class="col-6 text-end">
                        <del class="text-danger"><?= $list_product->price_sale; ?><sup>đ</sup></del>
                    </div>
                </div>
                <p><?= $list_product->detail; ?></p>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" value="1">
                </div>
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php require_once "views/frontend/components/footer.php" ?>