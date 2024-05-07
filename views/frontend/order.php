<?php require_once "../thietkewepLam/views/frontend/components/header.php" ?>
<?php require_once "../thietkewepLam/views/frontend/components/mod-menu.php" ?>

<?php
require_once "../thietkewepLam/app/Models/Order.php";
require_once "../thietkewepLam/app/Models/Product.php";
require_once "../thietkewepLam/app/Models/Orderdetail.php";



use Application\Models\Order;


$list_order = Order::join('orderdetail', 'orderdetail.order_id', '=', 'order.id')
    ->join('user', 'user.id', '=', 'order.user_id')
    ->where('user.id', '=', $_SESSION['logincustomer_id'])
    ->orderBy('order.created_at', 'desc')
    ->select('user.name', 'user.email as email', 'user.phone', 'order.*')
    ->distinct()->get();

?>
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="bg-light col-auto col-md-2 min-vh-100 border-end ">
            <div class="bg-light ">
                <a class="d-flex text-decoration-none mt-1 align-items-center text-dark">
                    <span class="fs-5 mt-2 d-none d-sm-inline text-start">Hồ Sơ</span>
                </a>
                <ul class="nav nav-pills flex-column mt-2">
                    <li class="nav-item">
                        <a href="index.php?option=userprofile" class="nav-link" aria-current="page">
                            <i class="fa-regular fa-circle-user" style="color:black;"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Tài Khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark">
                            <i class="fa-regular fa-bell"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Thông Báo</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?option=order" class="nav-link text-dark">
                            <i class="fa-regular fa-clipboard"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Đơn Mua</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?option=cart&cart-content" class="nav-link text-dark">
                            <i class="fa-solid fa-bag-shopping"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Giỏ Hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?option=customer&f=logout" class="nav-link text-dark">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="text-dark ms-3 d-none d-sm-inline">Đăng Xuất</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card-body">
                <table class="table table-tripped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center;" style="width: 100px;">Khách hàng</th>
                            <th class="text-center;" style="width:100px;">Email</th>
                            <th class="text-center;" style="width:100px;">Ngày đặt</th>
                            <th class="text-center;" style="width:100px;"> Trạng thái</th>
                            <th class="text-center;" style="width:50px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_order as $row) : ?>
                            <tr>
                                <td> <?= $row->name; ?></td>
                                <td><?= $row->email; ?></td>
                                <td><?= $row->phone; ?></td>
                                <td></td>
                                <td class="text-center"><a href="index.php?option=orderdetail&id=<?= $row->id; ?>">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                </td>
                            </tr>


                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once  'views/frontend/components/footer.php' ?>