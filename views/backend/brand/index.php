<?php
require_once '../app/Models/Brand.php';


use Application\Models\Brand;

$list = Brand::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once '../views/backend/header.php' ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tất Cả Thương Hiệu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tất Cả Thương Hiệu</li>
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
                        <a href="index.php?option=brand&cat=create">
                            <button class="btn btn-sm btn-success"><i class="fas fa-plus">Thêm</i></button>
                        </a>
                        <a href="index.php?option=brand&cat=trash">
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash">Thùng Rác</i></button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-tripped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center;" style="width:30px;">
                                <input type="checkbox" name="checkAll" id="checkAll" />
                            </th>
                            <th class="text-center;" style="width:100px;">Logo</th>
                            <th class="text-center;">Tên Thương Hiệu</th>
                            <th class="text-center;" style="width:180px;">Ngày Tạo</th>
                            <th class="text-center;" style="width:220px;">Chức Năng</th>
                            <th class="text-center;" style="width:30px;">Id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkAll()" value="<?= $row->id; ?>" />
                                </td>

                                <td>
                                    <img src="../public/images/brand/<?= $row->image; ?>" alt="hinh" class="img-fluid">
                                </td>
                                <td> <?= $row->name; ?></td>

                                <td class="text-center;"><?= $row->created_at; ?></td>
                                <td class="text-center">
                                    <?php if ($row->status == 1) : ?>
                                        <a href="index.php?option=brand&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-toggle-on"></i></a>
                                    <?php else : ?>
                                        <a href="index.php?option=brand&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-toggle-off"></i></a>
                                    <?php endif; ?><a href="index.php?option=brand&cat=show&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?option=brand&cat=edit&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?option=brand&cat=delete&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>


                                <td class="text-center;"></td>
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