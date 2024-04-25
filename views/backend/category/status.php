<?php
require_once '../app/Models/Category.php';
require_once '../app/Library/MyClass.php';

use Application\Models\Category;
use Application\Libraries\MyClass;

$id = $_REQUEST['id'];
$Category = Category::find($id);
if ($Category == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'mau tin khong ton tai']);
    header("location:index.php?option=category");
}
$Category->status = ($Category->status == 1) ? 2 : 1;
$Category->updated_at = date('Y-m-d H:i:s');
$Category->updated_by = (isset($_SESSION['logincustomer_id'])) ? $_SESSION['logincustomer_id'] : 1;
$Category->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'thay doi thanh cong']);
header("location:index.php?option=category");
