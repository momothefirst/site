<?php
    require_once 'connect.php';
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
<div class="mainpg">
    <?php include 'navbar.php'; ?>
</div>

<div class="content">
    <div class="slideshow">
    </div>
    <div class="checkout_page">
        <div class="row">
             <div class="col-sm-6 checkoutlist"> <!-- Lista do carrinho -->
                 <div class="insidechecklist1">
                     <ul>
                        <?php
                            if (!empty($_SESSION['cart']['id'])) {
                                $str = "";
                                foreach ($_SESSION['cart']['id'] as $id) {
                                    $str .= $id . ",";
                                }
                                $str = rtrim($str, ',');
                                //echo '<script>alert("str:'. $str .'")</script>';
                                //echo '<script>alert("id:'. $_SESSION['cart']['id'][0] .'")</script>';
                                $query_cart = "SELECT id, nome, price, img FROM products WHERE id IN (".$str.")";
                                $response_cart = @mysqli_query($dbc, $query_cart) or die ("could not search!");
                                $total = 0;
                                if ($response_cart) {
                                    while ($row = mysqli_fetch_array($response_cart)) {
                                        foreach ($_SESSION['cart']['id'] as $id) {
                                            if ($id == $row["0"]) {
                                                //echo '<script>alert("str:'. current($_SESSION['cart']['id']) .'")</script>';
                                                $qtd = array_search($id, $_SESSION['cart']['id']);
                                            }
                                        }
                                        echo '<li class="itemcart"><a href="product_page.php?id='.$row["0"].'">'. $_SESSION['cart']['qtd'][$qtd] . 'x ' .  $row["1"] .  '</a></li>';
                                        $total = $total + $row["2"] * $_SESSION['cart']['qtd'][$qtd];
                                    }
                                }
                                // Total e checkout button
                                echo '<div class="row"><p><span class="carttotal"> Total: '.number_format($total, 2).'€</span></p></div>';
                            } else {
                                echo 'Carrinho vazio, adicione items!';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 checkoutlist">
                <div class="row">
                    <div class="insidechecklist2">
                        <p>Tem a certeza que deseja concluir a sua encomenda? Vamos usar os dados fornecidos na criação da sua conta para envio dos produtos à cobrança. Para qualquer alteração ou cancelamento, estamos disponíves por email em <a href="mailto:encomendas@primetek.pt" style="color: orange;">encomendas@primetek.pt</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <button class="btn btn-default finalbtn conclude" type="submit" style="background-color: limegreen; color: white;">Concluir encomenda</button> 
                    </div>
                    <div class="col-md-6 ">
                        <button class="btn btn-default finalbtn back" type="submit" style="background-color: dodgerblue; color: white;">Voltar ao carrinho</button>
                    </div>
                </div>
            </div>
                        
        </div>
    </div>
    <?php include 'footer.php'; ?>  
</div>
    
<script>
     $('.conclude').click(function() {
        $.get("orders.php");
        location.href = "index.php";
        alert("A sua encomenda foi concluída! Obrigado por nos ter escolhido.")
        $.get("cleancart.php");
        return false;        
    });
</script>
            
            
</body>
</html>