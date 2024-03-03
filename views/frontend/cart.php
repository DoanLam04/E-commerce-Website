<!-- //xử lí dỏ hàng
//lấy url,sử lí, lưu session
//thanh toán-> lưu vào csdl 
//TH1: chưa có giỏ hàng:->>thêm mói
//TH2: sẩn phẩm đẵ có trong giỏ hàng->>>Qty++
//TH3: chua có trong giỏ hàng->>thêm mới-->

<?php require_once "app/Models/Product.php" ?>
<?php require_once "app/Models/Order.php" ?>
<?php require_once "app/Models/Orderdetail.php" ?>

<?php require_once "app/Models/User.php" ?>
<?php require_once "app/library/Cart.php" ?>

<?php

use Application\Models\Product;
use Application\Models\Order;
use Application\Models\Orderdetail;

use Application\Models\User;


use Application\library\Cart;
if (!isset($_SESSION['logincustomer'])) {
    header("Location:index.php?option=customer&f=login");
} else {
    //Thêm
    if (isset($_REQUEST['addcat'])) {
        $id = $_REQUEST['addcat'];
        $product = Product::find($id);


        // //Tạo mảng item
        $cart_item = array(
            'id' => $product->id,
            'price' => $product->price,
            'qty' => 1,
            'amount' => $product->price
        );

        //kiểm tra
        if (isset($_SESSION['contentcart'])) {
            //Kiểm tra có hay  chua trong giỏ hàng

            $carts = $_SESSION['contentcart'];
            if (Cart::cart_exists($carts, $id) == true) {
                $carts = Cart::cart_update($carts, $id, 1);
            } //true // co roi
            else {
                // $cart = array(); // Ensure $cart is an array
                $carts[] = $cart_item;
            } //chua co
            $_SESSION['contentcart'] = $carts;
        } else {
            $carts[] = $cart_item; //$cart-> là mảng 2 chiều
            $_SESSION['contentcart'] = $carts;
        }
        header("location:index.php?option=cart");
    }

    //Xóa
    //kiểm tra
    if (isset($_REQUEST['delcart'])) {
        $id = $_REQUEST['delcart'];
        //Kiểm tra có hay  chua trong giỏ hàng
        if (isset($_SESSION['contentcart'])) {
            $carts = $_SESSION['contentcart'];
            $carts = Cart::cart_delete($carts, $id);
            $_SESSION['contentcart'] = $carts;
        }
        header("location:index.php?option=cart");
    }
    //Cập Nhật
    if (isset($_POST['updateCart'])) {
        $arr_qty = $_POST['qty'];
        foreach ($arr_qty as $id => $number) {
            $carts = $_SESSION['contentcart'];
            $carts = Cart::cart_update($carts, $id, $number, "update");
            $_SESSION['contentcart'] = $carts;
        }
    }
    if (isset($_REQUEST['checkoutCart'])) {
        //Thanh Toán lưu vào CSDL order
        $user = User::find($_SESSION['logincustomer_id']);
        $date = getdate();
        $order = new Order();
        $order->code = $date[0];
        $order->user_id = $_SESSION['logincustomer_id'];

        $order->name = (isset($_POST['name'])) ? $_POST['name'] : $user['name'];
        $order->phone = (isset($_POST['phone'])) ? $_POST['phone'] : $user['phone'];
        $order->email = (isset($_POST['email'])) ? $_POST['email'] : $user['email'];
        $order->address = (isset($_POST['address']) ? $_POST['address'] : $user['address']);
        $order->created_at = date('Y-m-d H:i:s');
        $order->status = 2;

        if ($order->save()) {
            $carts = $_SESSION['contentcart'];
            foreach ($carts as $cart) {
                $orderdetail = new Orderdetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $cart['id'];
                $orderdetail->price = $cart['price'];
                $orderdetail->qty = $cart['qty'];
                $orderdetail->amount = $cart['amount'];
                $orderdetail->save();
            }
        }
        unset($_SESSION['contentcart']);
        header("location:index.php?option=cart");
    }

    if (isset($_REQUEST['checkout'])) {
        require_once "cart-checkout.php";
    } else {
        require_once "cart-content.php";
    }
}

?>