<?php require_once "../thietkewepLam/views/frontend/header.php" ?>
<?php require_once "../thietkewepLam/views/frontend/mod-menu.php" ?>

<?php
require_once "../thietkewepLam/app/Models/Order.php";
require_once "../thietkewepLam/app/Models/Product.php";
require_once "../thietkewepLam/app/Models/Orderdetail.php";

use Application\Models\Order;
use Application\Models\Orderdetail;
use Application\Models\Product;

$id = $_REQUEST['id'];
$order_detail = Order::find($id);

$order = Order::join('user', 'user.id', '=', 'order.user_id')->where('order.user_id', '=', $id)->first();

$orderdetail = Orderdetail::where('order_id', '=', $id)
    ->distinct()->get();
foreach ($orderdetail as $detail) {
    $product_id = $detail->product_id;
    $product = Product::where('id', '=', $product_id)->get();
    foreach ($product as $product_detail) {
        $name = $product_detail->name;
    }
}

?>


<div class="bg-image" style="background-image: url('../thietkewepLam/public/images/bg.png');height: 100vh">
    <div class="container mb-5">
        <div class="row ">
            <div class="row mt-4  ">
                <div class=" col-md-2"></div>
                <div class="col-md-8 bg-white rounded-3" style="box-shadow:7px 10px 5px gray;">
                    <div class="row border-bottom  mb-3 mx-1">
                        <div class="col-md-6 pt-2">
                            <h4>Detail Order</h4>
                        </div>
                        <div class="col-md-6 text-end py-3">
                            <h6>No.order:<?= $order_detail->code; ?></h6>
                        </div>
                    </div>
                    <div class="row mx-5 " style="background-color: #3b65c1;">
                        <h6 class="text-white py-1">Customer</h6>
                    </div>
                    <div class="row mx-5">
                        <table class="table table-tripped table-bordered table-hover">
                            <tr>
                                <td> Tên </td>
                                <td> <?= $order_detail->name; ?></td>
                            </tr>
                            <tr>
                                <td> Số điện thoại </td>
                                <td> <?= $order_detail->phone; ?></td>
                            </tr>
                            <tr>
                                <td> Email </td>
                                <td> <?= $order_detail->email; ?></td>
                            </tr>
                            <tr>
                                <td> Địa chỉ </td>
                                <td> <?= $order_detail->address; ?></td>
                            </tr>
                            <tr>
                                <td> Ngày Đặt </td>
                                <td> <?= $order_detail->created_at; ?></td>
                            </tr>
                            <tr>
                                <td> Ghi chú </td>
                                <td> <?= $order_detail->note; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="row mx-5 " style="background-color: #3b65c1;">
                        <h6 class="text-white py-1">Order</h6>
                    </div>
                    <div class="row mx-5">
                        <table class="table table-tripped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Trị giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orderdetail as $row) : ?>
                                    <tr>
                                        <td><?= $name; ?></td>
                                        <td><?= $row->qty; ?></td>
                                        <td><?= $row->price; ?></td>
                                        <td><?= $row->amount; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mx-5 ">
                        <h6 class="py-1">Tổng thanh toán: </h6>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <?php require_once  'views/frontend/footer.php' ?>