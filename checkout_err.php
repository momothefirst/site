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
    <div class="errorpage">
        <div class="row">
            <div class="row">
               <div class="col-md-12">
                   <p><span class=categ_title><span class="glyphicon glyphicon-shopping-cart"></span> Erro: Não fez login</span>
                </div>   
            </div>
            <div class="col-md-12 erro">
                <h4>Por favor faça login antes de fazer Checkout, obrigado!</h4>
            </div>
            
            
                
        </div>
        <div class="row">
            <?php  ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>  
</div>
    

    
</body>
</html>