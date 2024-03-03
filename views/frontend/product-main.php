<?php require_once "views/frontend/header.php" ?>
<?php require_once "app/Models/Product.php" ?>
<!----------------------------------------->


<section>
    <div class="container">
        <div class="row">

            <?php

            use Application\Models\Brand;
            use Application\Models\Product;

            $list_brand = Brand::where([['status', '!=', 0]])->get();

            $random_list_brand = rand(0, count($list_brand) - 1);
            $name_brand = $list_brand[$random_list_brand]->name;
            $poster_brand = $list_brand[$random_list_brand]->poster;
            $id_brand = $list_brand[$random_list_brand]->id;

            $list_product_brand = Product::where([['status', '!=', 0], ['brand_id', '=', $id_brand]])
                ->orderBy('product.created_at', 'DESC')->take(3)->get();
            ?>

            <div class="col-md-3 bg-light">
                <a href="index.php?option=product-brand&id=<?= $id_brand ?>">
                    <img class="img-fluid mt-5 mb-3" src="../thietkewepLam/public/images/brand/<?= $poster_brand ?>.png" alt="<?= $poster_brand ?>">
                    <h4 class="text-center"><?= $name_brand ?></h4>
                </a>
            </div>
            <?php foreach ($list_product_brand as $item_brand) : ?>
                <div class="col-md-3">
                    <div class="row">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="index.php?option=product-detail&id=<? $item_brand->id;?>">
                                    <img class="img-fluid " src="../thietkewepLam/public/images/products/<?= $item_brand->image; ?>" alt="<?= $item_brand->name; ?>">
                                </a>
                            </div>
                            <div class="product-name py-1">
                                <div class="row">
                                <a href="index.php?option=product-detail&id=<? $item_brand->id;?>"><p class="fs-6 py-1"><?= $item_brand->name; ?></p></a>
                                </div>
                            </div>
                            <div class="prodcut-price">
                                <div class="row">
                                    <div class="col-6 text-danger fs-5">
                                        <strong class="text-success"><?= $item_brand->price; ?><sup>đ</sup></strong>
                                    </div>
                                    <div class="col-6 text-end">
                                        <del class="text-danger"><?= $item_brand->price_sale; ?><sup>đ</sup></del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-cart-hearth-eye my-2">
                                <div class="row">
                                    <div class="col-8">
                                        <a href="index.php?option=cart&addcat=<?= $item_brand->id;?>" class="btn btn-sm btn-secondary  form-control form-control"> Thêm vào giỏ</a>
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
</section>
<!----------------------------------------->
<section>
    <div class="container">


        <?php

        use Application\Models\Category;

        $list_cat = Category::where([['status', '!=', 0]])->get();

        $random_list_cat = rand(0, count($list_cat) - 1);
        $name_cat = $list_cat[$random_list_cat]->name;
        $poster_cat = $list_cat[$random_list_cat]->poster;
        $id_cat = $list_cat[$random_list_cat]->id;

        $list_product = Product::where([['status', '!=', 0], ['category_id', '=', $id_cat]])
            ->orderBy('product.created_at', 'DESC')->take(3)->get();
        ?>
        <div class="row">
            <div class="col-md-3 bg-light">
                <a href="index.php?option=product-cat&id=<?= $id_cat ?>">
                    <img class="img-fluid mt-3" src="../thietkewepLam/public/images/category/<?= $poster_cat ?>.png" alt="<?= $poster_cat ?>">
                    <h4 class="mt-3 text-center"><?= $name_cat ?></h4>
                </a>
            </div>
            
            <?php foreach ($list_product as $item) : ?>
                <div class="col-md-3">
                    <div class="row mt-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                    <img class="img-fluid  " src="../thietkewepLam/public/images/products/<?= $item->image; ?>" alt="<?= $item->name; ?>">
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
</section>