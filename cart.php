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
                <p><span class=categ_title><span class="glyphicon glyphicon-shopping-cart">
                    </span> O Meu Carrinho</span><button id="emptycart"><span class="glyphicon glyphicon-remove"></span> Apagar Carrinho</button></p>

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
                                $total = $total + $row["2"];
                            }
                        }
                    } else {
                        echo 'cart empty';
                    }
                ?>
        </div>
        <div class="row">
            <?php echo '<div class="carttotal">Total: '.number_format($total, 2).'€</div>'; ?>
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