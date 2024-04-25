<?php

require_once '../app/Models/Brand.php';

use Application\Models\Brand;


$list = Brand::where('status', '!=', '0')->get();

$html_sort_order = "";
foreach ($list as $item) {
    $html_sort_order .= "<option value='" . ($item->sort_order) . "'>After:" . $item["name"] . "</option>";
}
?>
<?php require_once('../views/backend/header.php'); ?>
<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add new brand</h1>
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
                        <div class="col-md-6"></div>
                        <div class="col-md-6 text-right">
                            <button name="ADD" type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-save" aria-hidden="true"></i> Save [Add]
                            </button>

                            <a class="btn btn-sm btn-success" href="index.php?option=brand">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input name="name" id="name" type="text" class="form-control" required placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="metakey">Meta key</label>
                                <textarea name="metakey" id="metakey" class="form-control" required placeholder=""></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="metadesc">Description(SEO)</label>
                                <textarea name="metadesc" id="metadesc" class="form-control" required placeholder=""></textarea>
                            </div>

                        </div>
                        <div class="col-md-3">
                            <!-- <div class="mb-3">
                                <label for="parent_id">Sort</label>
                                <select id="parent_id" name="parent_id" class="form-control" required>
                                    <option value="0">none</option>
                                </select>
                            </div> -->
                            <div class="mb-3">
                                <label for="sort_order">Position</label>
                                <select id="sort_order" name="sort_order" class="form-control" required>
                                    <option value="0">--Choose a position--</option>
                                    <?= $html_sort_order; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input name="image" id="image" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="2">Unpublish</option>
                                    <option value="1">Publish</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a><button name="ADD" type="submit" class="btn btn-sm btn-success">
                                    <i class="nav-icon fas fa-save">
                                    </i> Save [add]
                                </button>
                            </a>
                            <a class="btn btn-sm btn-success" href="index.php?option=brand">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>

                        </div>
                    </div>
                </div>
                <!-- /.card-footer-->

            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
</form>
<?php require_once('../views/backend/footer.php'); ?>