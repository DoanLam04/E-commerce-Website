<?php

namespace Application;

class Route
{
    //Tùy biến Url cho trang người dùng
    public static function route_site()
    {
        $pathView = "views/frontend/";
        if (isset($_REQUEST['option'])) {
            //có option
            if (isset($_REQUEST['slug'])) {
                $pathView .= $_REQUEST['option'] . "-detail.php";
            } else {
                if (isset($_REQUEST['cat'])) {
                    $pathView .= $_REQUEST['option'] . "-category.php";
                } else {
                    if (isset($_REQUEST['search'])) {
                        $pathView .= $_REQUEST['option'] . ".php";
                    } else {
                        $pathView .= $_REQUEST['option'] . ".php";
                    }
                }
            }
        } else {
            $pathView .= 'home.php';
        }
        require_once $pathView;
    }

    //Tùy biến Url cho trang quản lí
    public static function route_admin()
    {
        $pathView = '../views/backend/';
        if (isset($_REQUEST['option'])) {
            $pathView .= $_REQUEST['option'] . '/';
            if (isset($_REQUEST['cat'])) {
                $pathView .= $_REQUEST['cat'] . '.php';
            } else {
                $pathView .= 'index.php';
            }
        } else {
            $pathView .= 'dashboard/index.php';
        }
        require_once $pathView;
    }
}
