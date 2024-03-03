<?php
require_once '../app/Models/Order.php';


use Application\Models\Order;

$list = Order::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
$list_status = [
    ['type' => 'secondary', 'text' => 'Đơn hàng mới'],
    ['type' => 'primary', 'text' => 'Đã xác nhận'],
    ['type' => 'info', 'text' => 'Đóng gói'],
    ['type' => 'warning', 'text' => 'Đã giao'],
    ['type' => 'danger', 'text' => 'Đã hủy'],
];
// var_dump($list_status);
?>
<?php require_once '../views/backend/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất Cả Đơn Hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tất Cả Đơn Hàng</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="index.php?option=order&cat=create">
                            <button class="btn btn-sm btn-success"><i class="fas fa-plus">Thêm</i></button>
                        </a>
                        <a href="index.php?option=order&cat=trash">
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash">Thùng Rác</i></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-tripped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">
                                <input type="checkbox" name="checkAll" id="checkAll" />
                            </th>
                            <th class="text-center" style="width:30px;">Mã</th>
                            <th class="text-center" style="width:100px;">Khách Hàng</th>
                            <th class="text-center" style="width:100px;">Email</th>
                            <th class="text-center" style="width:100px;">Điện thoại</th>
                            <th class="text-center" style="width:150px;">Ngày Tạo</th>
                            <th class="text-center" style="width:100px;">Trạng thái</th>
                            <th class="text-center" style="width:220px;">Chức Năng</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkAll()" value="<?= $row->id; ?>" />
                                </td>
                                <td class="text-center"><?= $row->code; ?></td>

                                <td> <?= $row->name; ?></td>
                                <td> <?= $row->email; ?></td>
                                <td class="text-center"><?= $row->phone; ?></td>
                                <td class="text-center"><?= $row->created_at; ?></td>
                                <td class="text-center"> </td>
                                <td class="text-center">
                                    <?php if ($row->status != 1) : ?>
                                        <a href="index.php?option=order&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-toggle-on"></i></a>
                                    <?php else : ?>
                                        <a href="index.php?option=order&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-toggle-off"></i></a>
                                    <?php endif; ?>
                                    <a href="index.php?option=order&cat=show&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?option=order&cat=edit&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?option=order&cat=delete&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once '../views/backend/footer.php' ?>