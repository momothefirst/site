<?php
    require_once('connect.php');
    $prod_id = $_GET["id"];
    $query_prod = "SELECT nome, descricao, price, img, categoria FROM products WHERE id=$prod_id";
    $response_prod = @mysqli_query($dbc, $query_prod);
    if ($response_prod) {
        while ($row = mysqli_fetch_array($response_prod)) {
            $_nome = $row["nome"];
            $_descricao = $row["descricao"];
            $_price = $row["price"];
            $_img = $row["img"];
            $_categ = $row["categoria"];
        }
    }
                


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

    <div class="productcontent">
      <div class="row">
        <div class="col-md-6">
          <div class="product_img"><img src="<?php echo $_img ?>" alt=""/></div>
        </div>

        <div class="col-md-6">
          <div class="product_desc">
            <h2><?php echo $_nome ?></h2>
            <h3><span class="price"><?php echo $_price ?>€</span></h3>
            <p><?php echo $_descricao ?></p>
          </div>

          <div class="addbuy_btn">
            <div class="row">
              <div class="col-sm-6">
                <a href="#"><div class="add_btn">Adicionar aos favoritos</div></a>
              </div>
              <div class="col-sm-6">
                <a href="addcart.php?id=<?php echo $prod_id ?>"><div class="buy_btn">Adicionar ao carrinho</div></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?> 
    
</div>

</body>
</html>