<?php
    require_once('connect.php');
    $query_computadores = "SELECT nome, id, descricao, price, img FROM products WHERE categoria='computadores'";
    $query_componentes = "SELECT nome, id, descricao, price, img FROM products WHERE categoria='componentes'";
    $query_armazenamento = "SELECT nome, id, descricao, price, img FROM products WHERE categoria='armazenamento'";
    $query_perifericos = "SELECT nome, id, descricao, price, img FROM products WHERE categoria='perifericos'";
    $response_comput = @mysqli_query($dbc, $query_computadores);
    $response_compon = @mysqli_query($dbc, $query_componentes);
    $response_armaz = @mysqli_query($dbc, $query_armazenamento);
    $response_perif = @mysqli_query($dbc, $query_perifericos);
    $cart = array();
    $_SESSION['cart']=$cart;
?>

<html lang="en">
<head>
  <title>PrimeTek - Loja Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="main2.css">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
<body>
    
<!--  NAVBAR -->    
<div class="mainpg">
        <?php include 'navbar.php'; ?>
</div>

<!-- INICIO CONTENT -->
<div class="content"> 
    <div class="slideshow">
    </div>
    
    <!-- 1ª CATEGORIA: COMPUTADORES -->        
    <div class="categoria categ_comput container-fluid">
        <div class="row">
            <p><span class=categ_title>Computadores</span></p>

            <?php 
                if ($response_comput) {
                    while ($row = mysqli_fetch_array($response_comput)) {
                        echo    '<a href="product_page.php?id=' . $row["id"] . '"><div class="col-md-3 prodimage">
                                    <div class="col-md-12 prod"><img src="'.$row["img"] .'" alt="" /><h4>' . $row["nome"] . '</h4></div>
                                </div></a>';
                    }
                }  
            ?>    
        </div>
    </div>
        
        

    
    <!-- 2ª CATEGORIA: COMPONENTES -->   
    <div class="categoria categ_compon container-fluid">
        <div class="row">
            <p><span class=categ_title>Componentes</span></p>

            <?php 
                if ($response_compon) {
                    while ($row = mysqli_fetch_array($response_compon)) {
                        echo    '<a href="product_page.php?id=' . $row["id"] . '"><div class="col-md-3 prodimage">
                                    <div class="col-md-12 prod"><img src="'.$row["img"] .'" alt="" /><h4>' . $row["nome"] . '</h4></div>
                                </div></a>';
                    }
                }  
            ?>    
        </div>
    </div>
    
    <!-- 3ª CATEGORIA: PERIFÉRICOS -->    
    <div class="categoria categ_perif container-fluid">
        <div class="row">
            <p><span class=categ_title>Periféricos</span></p>

            <?php 
                if ($response_perif) {
                    while ($row = mysqli_fetch_array($response_perif)) {
                        echo    '<a href="product_page.php?id=' . $row["id"] . '"><div class="col-md-3 prodimage">
                                    <div class="col-md-12 prod"><img src="'.$row["img"] .'" alt="" /><h4>' . $row["nome"] . '</h4></div>
                                </div></a>';
                    }
                }  
            ?>    
        </div>
    </div>

<!-- 4ª CATEGORIA: ARMAZENAMENTO -->    
    <div class="categoria categ_armaz container-fluid">
        <div class="row">
            <p><span class=categ_title>Armazenamento</span></p>

            <?php 
                if ($response_armaz) {
                    while ($row = mysqli_fetch_array($response_armaz)) {
                        echo    '<a href="product_page.php?id=' . $row["id"] . '"><div class="col-md-3 prodimage">
                                    <div class="col-md-12 prod"><img src="'.$row["img"] .'" alt="" /><h4>' . $row["nome"] . '</h4></div>
                                </div></a>';
                    }
                }  
            ?>    
        </div>
    </div>
    
    
    <?php include 'footer.php'; ?> 
    
</div>
    
<!-- FIM CONTENT -->
    
</body>
</html>