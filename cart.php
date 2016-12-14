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
    <div class="content_page">
        <div class="row">
            <div class="row">
               <div class="col-md-12">
                   <p><span class=categ_title><span class="glyphicon glyphicon-shopping-cart"></span> O Meu Carrinho</span><button id="emptycart"><span class="glyphicon glyphicon-remove"></span> Apagar Carrinho</button></p>
                </div>   
            </div>
            <div class="col-md-9"> <!-- Lista de product cards no carrinho -->
                <?php
                    if (!empty($_SESSION['cart'])) {
                        $str = "";
                        foreach ($_SESSION['cart']['id'] as $id) {
                            $str .= $id . ",";
                        }
                        $str = rtrim($str, ',');
                        $query_cart = "SELECT id, nome, price, img FROM products WHERE id IN (".$str.")";
                        $response_cart = @mysqli_query($dbc, $query_cart) or die ("could not search!");
                        $total = 0.0;
                        if ($response_cart) {
                            while ($row = mysqli_fetch_array($response_cart)) {
                                echo    '<a href="product_page.php?id=' . $row["0"] . '"><div class="col-md-3 prodimage">
                                <div class="col-md-12 prod"><img src="'.$row["3"] .'" alt="" /><h4>' . $row["1"] . ' <span class="prodprice">'.$row["2"].'€</span></h4></div>
                                 </div></a>';
                                $total = $total + $row["2"] * $_SESSION['cart']['qtd'][$qtd];
                            }
                        }
                    } else {
                        echo 'cart empty';
                    }
                ?>
            </div>
            <div class="col-md-3 cartlistOut"> <!-- Lista do carrinho -->
                <div class="cartlist">
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
                            echo '<div class="row"><p><span><a href="checkout.php"><button class="checkout_btn_cart btn btn-default">Checkout</button></a></span><span class="carttotal"> Total: '.number_format($total, 2).'€</span></p></div>';
                        } else {
                            echo 'Carrinho vazio, adicione items!';
                        }
                    ?>
                </div>
            </div>
                
        </div>
        <div class="row">
            <?php  ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>  
</div>
    
    
<script type="text/javascript">
    $('#emptycart').click(function() {
        $.get("cleancart.php");
        window.location.reload(true);
        return false;        
    });
    
</script>
    
    
</body>
</html>