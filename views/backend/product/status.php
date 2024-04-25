<?php
require_once '../app/Models/Product.php';
require_once '../app/Library/MyClass.php';

use Application\Models\Product;
use Application\Libraries\MyClass;

$id = $_REQUEST['id'];
$Product = Product::find($id);
if ($Product == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'mau tin khong ton tai']);
    header("location:index.php?option=product");
}
$Product->status = ($Product->status == 1) ? 2 : 1;
$Product->updated_at = date('Y-m-d H:i:s');
$Product->updated_by = (isset($_SESSION['logincustomer_id'])) ? $_SESSION['logincustomer_id'] : 1;
$Product->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'thay doi thanh cong']);
header("location:index.php?option=product");
