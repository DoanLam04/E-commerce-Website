<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<style>
    .img-thumbnail {
        width: 200px;
        height: 200px;
    }

    .container {
        margin-top: 50px;
    }
</style>

<?php require_once "views/frontend/header.php" ?>
<?php require_once "app/Models/Product.php" ?>
<?php require_once 'views/frontend/mod-menu.php' ?>
<?php

use Application\Models\Product;

$id = $_REQUEST['id'];
$list_product = Product::find($id);

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="../thietkewepLam/public/images/products/<?= $list_product->image; ?>" alt="Product" class="img-thumbnail">
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

<?php require_once "views/frontend/footer.php" ?>