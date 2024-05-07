<?php require_once "./views/frontend/components/header.php" ?>
<!-- -----------------=---------------------------------------->
<?php require_once "./views/frontend/components/mod-menu.php" ?>
<!-- -----------------=---------------------------------------->
<?php

require_once './app/Library/MyClass.php';

use Application\Libraries\MyClass;
?>
<section class="dxl-maincontent">
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
    <?php require_once "./views/frontend/components/mod-sliders.php" ?>
    <?php require_once "product-box.php"; ?>

</section>
<section class="dxl-ads"></section>
<!-- -----------------=---------------------------------------->
<?php require_once "./views/frontend/components/footer.php" ?>
<!-- -----------------=---------------------------------------->