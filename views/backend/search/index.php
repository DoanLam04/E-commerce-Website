<?php require_once '../views/backend/header.php'; ?>
<?php


// require_once '../app/Models/Post.php';

// require_once '../app/Models/Product.php';

// use Application\Models\Product;
// use Application\Models\Post;
// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "thietkeweplam");
$keyword = $_REQUEST['search'];
// Thực hiện truy vấn SELECT- tìm kiếm theo tên sản phẩm
$sql = "SELECT pro.id,pro.name,pro.image,price,price_sale,pro.detail,pro.slug,brand.name as product_brand_name
        FROM product pro join category cat on  cat.id=pro.category_id
                         join brand on brand.id=pro.brand_id        
        WHERE pro.name like '%$keyword%' or cat.name like '%$keyword%' or brand.name like '%$keyword'";
$result = mysqli_query($conn, $sql);
?>
<!-- Hiển thị danh sách sản phẩm -->
<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list_product = $result;
?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tất Cả Sản Phẩm</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="card-body">
                <table class="table table-tripped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center;" style="width:30px;">
                                <input type="checkbox" name="checkAll" id="checkAll" />
                            </th>
                            <th class="text-center;" style="width:100px;">Hình</th>
                            <th class="text-center;" style="width:150px;">Tên</th>
                            <th class="text-center;" style="width:70px;">Brand</th>
                            <th class="text-center;" style="width:70px;">Giá</th>
                            <th class="text-center;" style="width:70px;">Giá sale</th>
                            <th class="text-center;" style="width:100px;">Chi tiết</th>
                            <th class="text-center;" style="width:150px;"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_product as $product) : ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="checkAll()" value="<?= $product['id']; ?>" />
                                </td>
                                <td class="text-center">
                                    <img class="img-fluid" src="../public/images/products/<?= $product["image"] ?>" alt="<?= $product["name"] ?>">
                                </td>
                                <td class="text-center"> <?= $product["name"] ?> </td>
                                <td class="text-center"><?= $product["product_brand_name"] ?> </td>
                                <td class="text-center"><?= $product["price"] ?> </td>
                                <td class="text-center"><?= $product["price_sale"] ?> </td>
                                <td class="text-center"><?= $product["detail"] ?> </td>
                                <td class="text-center"></td>
                            </tr> <?php endforeach; ?>
                    </tbody>
                </table>
            <?php
        }
    } else { ?>
            <h4 style="color:red;">Không có sản phẩm nào phù hợp với từ khóa tìm kiếm.</h4>
        <?php
    }
        ?>
        <?php
        // Ngắt kết nối với cơ sở dữ liệu
        mysqli_close($conn);
        require_once '../views/backend/footer.php';
        ?>