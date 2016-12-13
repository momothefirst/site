<?php
    session_start();
    $id = $_GET['id'];
    $qtd = $_GET['qtd'];
    if (isset($id)) {
        echo '<script>alert("idset")</script>';
        if (count($_SESSION['cart']) > 0) {
            echo '<script>alert("count>0")</script>';
            foreach($_SESSION['cart']['id'] as $value) {
                if ($value == $id) {
                    break;
                } else {
                    $_SESSION['cart']['id'][] = $id;
                    $_SESSION['cart']['qtd'][] = $qtd;
                }
            }
        } else {
            $_SESSION['cart']['id'][] = $id;
            $_SESSION['cart']['qtd'][] = $qtd;
            echo '<script>alert("id:'. $_SESSION['cart']['id'][0] .'")</script>';
            echo '<script>alert("count: '. count($_SESSION['cart']['id']) .'")</script>';
        }
    }
    echo '<script>alert("end")</script>';
    header("location: product_page.php?id=".$_GET['id']);

?>