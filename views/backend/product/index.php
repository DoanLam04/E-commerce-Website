<?php
require_once '../app/Models/Product.php';

use Application\Models\Product;

$list = Product::join('category', 'category.id', '=', 'product.category_id')
    ->join('brand', 'product.brand_id', '=', 'brand.id')
    ->where('product.status', '!=', 0)
    ->orderBy('created_at', 'DESC')
    ->select("product.*", "category.name as category_name", "brand.name as brand_name")->get();

?>
<?php require_once '../views/backend/header.php' ?>
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
                        <li class="breadcrumb-item active">Tất Cả Sản Phẩm</li>
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
                        <a href="index.php?option=product&cat=create">
                            <button class="btn btn-sm btn-success"><i class="fas fa-plus">Thêm</i></button>
                        </a>
                        <a href="index.php?option=product&cat=trash">
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
                        <?php foreach ($list as $row) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="checkAll()" value="<?= $row->id; ?>" />
                                </td>

                                <td>
                                    <img src="../public/images/products/<?= $row->image; ?>" alt="<?= $row->name ?>" class="img-fluid">
                                </td>
                                <td> <?= $row->name; ?></td>
                                <td><?= $row->brand_name; ?></td>
                                <td><?= $row->price; ?></td>
                                <td><?= $row->price_sale; ?></td>
                                <td><?= $row->detail; ?></td>


                                <td class="text-center">
                                    <?php if ($row->status == 1) : ?>
                                        <a href="index.php?option=product&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-success">
                                            <i class="fas fa-toggle-on"></i></a>
                                    <?php else : ?>
                                        <a href="index.php?option=product&cat=status&id=<?= $row->id; ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-toggle-off"></i></a>
                                    <?php endif; ?><a href="index.php?option=product&cat=show&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="index.php?option=product&cat=edit&id=<?= $row->id; ?>
                                " class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?option=product&cat=delete&id=<?= $row->id; ?>
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