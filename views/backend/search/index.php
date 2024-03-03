<?php require_once '../views/backend/header.php'; ?>
<?php


require_once '../app/Models/Post.php';

require_once '../app/Models/Product.php';

use Application\Models\Product;
use Application\Models\Post;

$keyword = $_REQUEST['search'];
$list_product = Product::where('status', '=', 1)->where('name', '=', $keyword)->orderBy('created_at', 'desc')->get();
$list_post = Post::where('status', '=', 1)->where('title', '=', $keyword)->orderBy('created_at', 'desc')->get();

foreach ($list_product as $product) {
    $item = array(
        'name' => $product->name,
        'image' => "products/" . $product->image,
        'slug' => $product->slug,
        'table ' => 'product'
    );
    $list_item[] = $item;
}
foreach ($list_post as $post) {
    $item = array(
        'name' => $post->name,
        'image' => "posts/" . $post->image,
        'slug' => $post->slug,
        'table ' => 'post'
    );
    $list_item[] = $item;
}
$title = "Tìm kiếm Thông tin:";
?>
<section>
    <div class="container">
        <div class="row">

        </div>

    </div>
</section>
<?php require_once '../views/backend/footer.php'; ?>