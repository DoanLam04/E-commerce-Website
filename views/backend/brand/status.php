<?php
require_once '../app/Models/Brand.php';
require_once '../app/Library/MyClass.php';

use Application\Models\Brand;
use Application\Libraries\MyClass;


$id = $_REQUEST['id'];
$Brand = Brand::find($id);
if ($Brand == null) {
    MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'mau tin khong ton tai']);
    header("location:index.php?option=brand");
}
$Brand->status = ($Brand->status == 1) ? 2 : 1;
$Brand->updated_at = date('Y-m-d H:i:s');
$Brand->updated_by = (isset($_SESSION['logincustomer_id'])) ? $_SESSION['logincustomer_id'] : 1;
$Brand->save();
MyClass::set_flash('message', ['type' => 'success', 'msg' => 'thay doi thanh cong']);
header("location:index.php?option=brand");
