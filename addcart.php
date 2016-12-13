<?php
    session_start();
    if (isset($_GET['id'])) {
        if (count($_SESSION['cart']) > 0) {
            foreach($_SESSION['cart'] as $value) {
                if ($value == $_GET['id']) {
                    break;
                } else {
                    array_push($_SESSION['cart'], $_GET['id']);
                }
            }
        } else {
            array_push($_SESSION['cart'], $_GET['id']);
        }
    }
    header("location: product_page.php?id=".$_GET['id']);

?>