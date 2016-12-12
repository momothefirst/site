<?php
    session_start();
    if (isset($_GET['id'] && $_GET['qtd'])) {
        $id = $_GET['id'];
        $qtd = $_GET['qtd'];
        if (count($_SESSION['cart']) > 0) {
            foreach($_SESSION['cart'] as $item) {
                if ($item[$id] == $_GET['id']) {
                    break;
                } else {
                    $_SESSION['cart'][$id] = $_GET['id'];
                    $_SESSION['cart'][$qtd] = $_GET['qtd'];
                }
            }
        } else {
            $_SESSION['cart'][$id] = $_GET['id'];
            $_SESSION['cart'][$qtd] = $_GET['qtd'];
        }
    }
    header("location: product_page.php?id=".$_GET['id']);

?>