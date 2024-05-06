<?php
require_once '../app/Models/Brand.php';
require_once '../app/Models/User.php';

use Application\Models\Brand;
use Application\Models\User;
use Application\Libraries\MyClass;



$id = $_REQUEST['id'];
$Brand = Brand::find($id);
$user_id = $Brand->created_by;
$user_id1 = $Brand->updated_by;
if ($Brand == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'mau tin khong ton tai']);
    header("location:index.php?option=brand");
}
$User = User::where([['status', '!=', 0]])->get();
?>
<?php require_once '../views/backend/header.php'; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h2>Brand </h2>
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
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card text-black ">
                        <i class="px-2 py-1 <?= $Brand->icon; ?>"></i>
                        <img src="../public/images/brand/<?= $Brand->image; ?>" class="card-img-top px-3 pt-1" alt="<?= $Brand->name; ?>" />
                        <div class="card-body fs-4">
                            <table>
                                <tr>
                                    <td style="width: 150px;">Id:</td>
                                    <td style="width: 150px;"><?= $Brand->id; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Name:</td>
                                    <td style="width: 150px;">
                                        <p><?= $Brand->name; ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Detail:</td>
                                    <td style="width: 150px;"><?= $Brand->slug; ?></td>
                                </tr>
                                <tr>
                                    <td class="my-5" style="width: 150px;">Created at:</td>
                                    <td style="width: 150px;"><?= $Brand->created_at; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Created by:</td>
                                    <?php
                                    foreach ($User as $user_row) :
                                        if ($user_row->id == $user_id) :
                                    ?>
                                            <td style="width: 150px;"><?= $user_row->name; ?></td>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>

                                </tr>
                                <tr>
                                    <td style="width: 150px;">Updated at:</td>
                                    <td style="width: 150px;"><?= $Brand->updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 150px;">Updated by:</td>
                                    <?php
                                    foreach ($User as $user_row) :
                                        if ($user_row->id == $user_id1) :
                                    ?>
                                            <td style="width: 150px;"><?= $user_row->name; ?></td>
                                    <?php
                                        endif;
                                    endforeach;
                                    ?>

                                </tr>
                                <tr>
                                    <td style="width: 150px;">Status:</td>
                                    <td style="width: 150px;"><?= $Brand->status; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once '../views/backend/footer.php'; ?>