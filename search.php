<?php
    require_once('connect.php');
    $search = $_GET["searchtext"];
    $search = preg_replace("#^0-0a-z#i","", $search);
    $query_search = "SELECT id, nome, descricao, price, img, categoria FROM products WHERE nome LIKE '%$search%' OR descricao LIKE '%$search%'";
    $response_search = @mysqli_query($dbc, $query_search) or die ("could not search!");
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
                    <p><span class=categ_title><?php echo 'Resultados para: ' . $_GET["searchtext"]; ?></span></p>
            
                    <?php
                        if ($response_search) {
                            while ($row = mysqli_fetch_array($response_search)) {
                                echo    '<a href="product_page.php?id=' . $row["0"] . '"><div class="col-md-3 prodimage">
                                            <div class="col-md-12 prod"><img src="'.$row["4"] .'" alt="" /><h4>' . $row["1"] . '</h4></div>
                                        </div></a>';                                
                            }
                        }
                    ?>
                    
            </div>
        </div>

    <?php include 'footer.php'; ?>  
</div>
    
    
    
    
    
</body>
</html>