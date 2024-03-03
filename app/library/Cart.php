<?php

namespace Application\library;

class Cart
{
    public function user($user_id, $id)
    {
        foreach ($user_id as $userid) {
            if ($userid == $id)
                return true;
        }
        return false;
    }
    public static function cart_exists($carts, $id)
    {


        foreach ($carts as $cart) {
            if ($cart['id'] == $id) {
                return true;
            }
        }
        return false;
    }
    public static  function cart_update($carts, $id, $number, $type = "add")
    {
        foreach ($carts as $key => $cart) {
            if ($cart['id'] == $id) {
                if ($type == "add") {
                    $carts[$key]['qty'] += intval($number);
                } else {
                    $carts[$key]['qty'] = intval($number);
                }
                $carts[$key]['amount'] = $carts[$key]['qty'] * $carts[$key]['price'];
                break;
            }
        }
        return $carts;
    }
    public static function cart_delete($carts, $id)
    {
        if (is_numeric($id)) {
            foreach ($carts as $key => $cart) {
                if ($cart['id'] == $id) {
                    unset($carts[$key]);
                    break;
                }
            }
            return $carts;
        } else {
            return null;
        }
    }
}
