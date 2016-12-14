<?php
    if (isset($_SESSION["logged"]) {
        $to      = $_SESSION["email"];
        $subject = "Compra";
        $message = "Compra efectuado com sucesso.";
        $headers = "From: encomendas@primetek.pt";
        if(mail($to, $subject, $message, $headers)) {
         echo '<script>alert("mail ok")</script>'
        } else {
            echo '<script>alert("mail not ok")</script>'
        }
    } else {
        echo "Não está loggado!";
    }
?>