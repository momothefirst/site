<?php
    require_once('connect.php');
    if (isset($_SESSION["logged"])) {
        $to      = $_SESSION["email"];
        $subject = "Compra";
        $message = "Compra efectuado com sucesso.";
        $headers = "From: encomendas@primetek.pt";
        $query = "SELECT idencomenda FROM orders 
        ORDER BY idencomenda DESC 
        LIMIT 1";
        
        $result = $dbc->query($query);	
        if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
                        $idlastorder = $row["idencomenda"];
                    }
        }
        $idlastorder++;
        $iduser = $_SESSION["iduser"];
        
        foreach($_SESSION['cart']['id'] as $idprod) {
        
            $orderquery = "INSERT INTO orders (idusers, idencomenda, idprod) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($dbc, $orderquery);
            mysqli_stmt_bind_param($stmt, "iii", $iduser, $idlastorder, $idprod);
            mysqli_stmt_execute($stmt);
        
        }
        
        
              
        if(mail($to, $subject, $message, $headers)) {
         echo '<script>alert("mail ok")</script>';
        } else {
            echo '<script>alert("mail not ok")</script>';
        }
    } else {
        echo '<script>alert("Não está loggado!")</script>';
    }
?>