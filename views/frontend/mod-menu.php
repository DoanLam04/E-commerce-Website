<?php require_once "../thietkewepLam/app/Models/Brand.php"; ?>
<?php

use Application\Models\Brand;

$list = Brand::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once "../thietkewepLam/app/Models/Category.php"; ?>
<?php

use Application\Models\Category;

$list_category = Category::where([['status', '!=', 0], ['parent_id', '=', 0]])
    ->orderBy('sort_order', 'ASC')->get();
?>

<section class="dxl-mainmenu bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand d-block d-md-none" href="#">Menu</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php?option=home">Home</a>
                        </li>
                        <li class="nav-item dropdown ">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thương Hiệu</a>
                            <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                <?php foreach ($list as $row) : ?>
                                    <li>
                                        <a class="dropdown-item" href="index.php?option=product-brand&id=<?= $row->id; ?>"> <?= $row->name; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Phổ biến
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($list_category as $row) : ?>
                                    <li><a class="dropdown-item" href="index.php?option=product-category&id=<?= $row->id; ?>"><?= $row->name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Shops</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>