<?php
require_once '../app/Models/Brand.php';
require_once '../app/Library/MyClass.php';

use Application\Models\Brand;
use Application\Libraries\MyClass;

// ADD
if (isset($_POST['ADD'])) {

    $brand = new Brand();
    $brand->name = $_POST['name'];
    $brand->slug = MyClass::str_slug($_POST['name']);
    $brand->sort_order = $_POST['sort_order'];

    $brand->metakey = $_POST['metakey'];
    $brand->metadesc = $_POST['metadesc'];

    // upload file
    $file = $_FILES['image'];
    if (strlen($file['name']) > 0) {
        $target_dir = "../public/images/brand/";
        $target_file = $target_dir . basename($file['name']);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['png', 'gif', 'jpg', 'jpeg', 'webp'])) {
            $filename = $brand->slug . "." . $extension;
            move_uploaded_file($file['tmp_name'], $file['name']);
            $brand->image = $filename;
        }
    }
    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = $_SESSION['user_id'] ?? 1;
    $brand->status = $_POST['status'];
    $brand->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=brand');
}
//Update{edit}
if (isset($_POST['UPDATE'])) {
    $id = $_POST['id'];
    $brand = Brand::find($id);
    $brand->name = $_POST['name'];
    $brand->slug = MyClass::str_slug($_POST['name']);

    $brand->sort_order = $_POST['sort_order'];
    $brand->level = ($brand->parent_id == 0) ? 1 : 0; //lat xu li

    // upload file
    $file = $_FILES['image'];
    if (strlen($_FILES['img']['name'])) {
        $target_dir = "../public/images/brand/";
        $target_file = $target_dir . basename($file['name']);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (in_array($extension, ['png', 'gif', 'jpg', 'jpeg', 'webp'])) {
            $filename = $brand->slug . "." . $extension;
            move_uploaded_file($file['tmp_name'], $file['name'], $target_dir . $filename);
            $brand->image = $filename;
        }
    }
    $brand->metakey = $_POST['metakey'];
    $brand->metadesc = $_POST['metadesc'];

    $brand->created_at = date('Y-m-d H:i:s');
    $brand->created_by = $_SESSION['user_id'] ?? 1;
    $brand->status = $_POST['status'];
    $brand->updated_at = date('Y-m-d H:i:s');
    $brand->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    $brand->slug = MyClass::str_slug($_brand->name);
    $brand->save();
    MyClass::set_flash('message', ['type' => 'success', 'msg' => 'Thêm thành công']);
    header('location: index.php?option=brand');
}
