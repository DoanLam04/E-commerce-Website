<?php
require_once '../app/Models/Brand.php';
require_once '../app/Library/MyClass.php';

use Application\Models\Brand;

use Application\Libraries\MyClass;



$list = Brand::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();
?>
<?php require_once '../views/backend/header.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
    // Kiểm tra xem đã có thông báo được thiết lập hay chưa

    if (MyClass::exists_flash('message')) {
        $message = MyClass::get_flash('message');
        // Hiển thị thông báo
        echo '<div id="Alert" class="alert alert-' . $message['type'] . '">' . $message['msg'] . '</div>
        <script>
        setTimeout(function() {
            document.getElementById("Alert").style.display="none";
        },3000);
        </script>        
        ';
    } ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brand</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brand</li>
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
                        <a href="#">
                            <button class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="index.php?option=brand&cat=create">
                            <button class="btn btn-sm btn-success"><i class="fas fa-plus"> Add new</i></button>
                        </a>
                        <a href="index.php?option=brand&cat=trash">
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"> Trash</i></button>
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
                            <th class="text-center;">Name</th>
                            <th class="text-center;" style="width:180px;">Date</th>
                            <th class="text-center;" style="width:220px;">Edit</th>
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
                                    <img src="../public/images/brand/<?= $row->image; ?>" alt="<?= $row->name; ?>" class="img-fluid">
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
                                    <?php endif; ?>
                                    <a href="index.php?option=brand&cat=show&id=<?= $row->id; ?>" class="btn btn-sm btn-info"> <i class="fas fa-eye"></i> </a>
                                    <a href="index.php?option=brand&cat=update&id=<?= $row->id; ?>" class="btn btn-sm btn-primary"> <i class="fas fa-edit"></i> </a>
                                    <a href="index.php?option=brand&cat=delete&id=<?= $row->id; ?>" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> </a>
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