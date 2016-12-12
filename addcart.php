<?php
    session_start();
    if (isset($_GET['id'])) {
        array_push($_SESSION['cart'], $_GET['id']);
    }
    header("location: product_page.php?id=".$_GET['id']);

?>