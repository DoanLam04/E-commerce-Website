<?php
$p = $_REQUEST['p'];
switch ($p) {
    case 'product-brand': {
            require_once '../thietkewepLam/views/frontend/product-brand.php';
            break;
        }
    case 'product-category': {
            require_once '../thietkewepLam/views/frontend/product-category.php';
            break;
        }
    default: {
            require_once 'views/frontend/product.php';
        }
}
