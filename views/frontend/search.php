<?php require_once "../thietkewepLam/views/frontend/components/header.php"  ?>
<!-- -----------------=---------------------------------------->
<?php require_once "../thietkewepLam/views/frontend/components/mod-menu.php" ?>

<?php

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "thietkeweplam");

// Lấy từ khóa tìm kiếm
$search = $_REQUEST["search"];
// Thực hiện truy vấn SELECT- tìm kiếm theo tên sản phẩm
$sql = "SELECT pro.id,pro.name,pro.image,price,price_sale,pro.detail,pro.slug
        FROM product pro join category cat on  cat.id=pro.category_id
                         join brand on brand.id=pro.brand_id        
        WHERE pro.name like '%$search%' or cat.name like '%$search%' or brand.name like '%$search'";
$result = mysqli_query($conn, $sql);
?>
<!-- Hiển thị danh sách sản phẩm -->
<?php
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $list_product = $result;
?>
    <section class="maincontent">
      <div class="container">
        <div class="row">
          <?php foreach ($list_product as $product) : ?>
            <div class="col-md-3 ">
              <div class="row">
                <div class="product-item">
                  <div class="product-image">
                    <a href="#">
                      <img class="img-fluid" src="../thietkewepLam/public/images/products/<?= $product["image"] ?>" alt="<?= $product["name"] ?>">
                    </a>
                  </div>
                  <div class="product-name py-1">
                    <div class="row">
                      <p class="fs-6 py-1"><?= $product["name"] ?></p>
                    </div>
                  </div>
                  <div class="prodcut-price">
                    <div class="row">
                      <div class="col-3 text-danger fs-5">
                        <strong class="text-success"><?= $product["price"] ?><sup>đ</sup></strong>
                      </div>
                      <div class="col-3 text-end">
                        <del class="text-danger"><?= $product["price_sale"] ?><sup>đ</sup></del>
                      </div>
                      <div class="col-3">
                        <a href="index.php?option=cart&addcat=<?= $product['id'] ?>" class="btn btn-sm btn-secondary  form-control form-control"><i class="fa-solid fa-cart-plus"></i></a>
                      </div>
                      <div class="col-3">
                        <a href="index.php?option=cart&addcat" class="btn btn-sm btn-info  form-control form-control"><i class="fa-regular fa-heart"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="product-cart-hearth-eye my-2">
                    <div class="row">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- 
     echo "<p>";
      echo "<b>Mã sản phẩm:</b> " . $row["id"];
      echo "<br>";
      echo "<b>Tên sản phẩm:</b> " . $row["name"];
      echo "<br>";
      echo "<b>Giá sản phẩm:</b> " . $row["price"];
      echo "<br>";
      echo "<b>Mô tả sản phẩm:</b> " . $row["slug"];
      echo "<b>Mô tả sản phẩm:</b> " . $row["image"];
      echo "</p>";
      echo "</p>";
      ?> -->
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

?>
</div> <!-- row end.// -->

<div class="box text-center">
  <p>Did you find what you were looking for？</p>
  <a href="#" class="btn btn-light">Yes</a>
  <a href="#" class="btn btn-light">No</a>
</div>

</div> <!-- container .//  -->
<?php
?>

<!-- -----------------=---------------------------------------->
<?php require_once "views/frontend/components/footer.php" ?>
<!-- -----------------=---------------------------------------->