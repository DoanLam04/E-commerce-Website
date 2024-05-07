<?php require_once "app/Models/Product.php" ?>
<?php require_once 'views/frontend/components/mod-menu.php' ?>
<?php require_once "app/Models/Product_image.php" ?>

<?php

use Application\Models\Product;
use Application\Models\Product_image;

$list_product = Product::where([['status', '=', 1]])
    ->get();

?>

<section class="maincontent">
    <div class="container bg-body-tertiary">
        <div class="row">
            <?php foreach ($list_product as $item) : ?>
                <div class="col-md-3 bg-white gap-3 ">
                    <div class="row">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="index.php?option=product-detail&id=<?= $item->id; ?>">
                                    <img class="img-fluid " id="<?= $item->id; ?>" src="../thietkewepLam/public/images/products/<?= $item->image; ?>" alt="<?= $item->name; ?>">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex flex-column justify-content-between">
                        <div class="product-name bg-white" style="height: fit-content;">
                            <a href=" index.php?option=product-detail&id=<?= $item->id; ?>">
                                <p class=" ps-2"><?= $item->name; ?></p>
                            </a>
                        </div>
                        <div class="product-price bg-white d-flex justify-content-between">
                            <div class="col-md-6 fs-6 ps-2">
                                $<?= $item->price; ?>
                            </div>
                            <div class="col-md-6 text-end">
                                <del class="">$<?= $item->price_sale; ?></del>
                            </div>
                        </div>

                    </div>
                    <div class="row pt-1 ">
                        <div class="col-sm-8 ">
                        </div>
                        <div class="col-sm-2 ">
                            <button class="btn btn-sm fs-6 text-end " style="width: fit-content;">
                                <a href="#">
                                    <i class="fa-regular fa-heart"></i>
                                </a>
                            </button>
                        </div>
                        <div class="col-sm-2 ">
                            <button class="btn btn-sm fs-6" style="width: fit-content;">
                                <a href="index.php?option=cart&addcat=<?= $item->id; ?>">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </a>
                            </button>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

</section>
<?php foreach ($list_product as $product) {
    $list_images = Product_image::where('product-id', '=', $product->id)
        ->get(); // Lấy tất cả các hình ảnh có product-id tương ứng với id của sản phẩm
    // Check if there are at least 2 images associated with the product
    if (count($list_images) >= 2) {
        $second_image = $list_images[1]; // Retrieve the second image
?>

        <script>
            // Đợi cho tất cả các phần tử img trong class product-image load hoàn tất
            document.addEventListener("DOMContentLoaded", function() {
                const productImages = document.querySelectorAll('.product-image img[id="<?= $product->id ?>"]');

                // Lặp qua từng phần tử img
                productImages.forEach(function(img) {
                    let originalSrc = img.getAttribute('src');
                    let hoverSrc = '';
                    let isHovered = false;

                    // Lấy đường dẫn của hình ảnh khi hover qua từ mảng list_images
                    <?php foreach ($list_images as $image) : ?>
                        hoverSrc = '../thietkewepLam/public/images/products/<?= $second_image->url ?>';
                    <?php endforeach; ?>

                    // Gán sự kiện mouseover để thay đổi hình ảnh khi di chuột qua
                    img.addEventListener('mouseover', function() {
                        if (!isHovered) {
                            isHovered = true;
                            img.src = hoverSrc;
                            img.style.transition = "1s ease-in-out";

                        }
                    });

                    // Gán sự kiện mouseout để khôi phục hình ảnh gốc khi di chuột ra khỏi
                    img.addEventListener('mouseout', function() {
                        if (isHovered) {
                            isHovered = false;
                            img.src = originalSrc;
                            img.style.transition = "1s ease-in-out";

                        }
                    });

                });

            });
        </script>
<?php }
} ?>