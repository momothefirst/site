<?php
    require_once('connect.php');
    $categ = $_GET["cat"];
    $query_cat = "SELECT id, nome, descricao, price, img, categoria, subcat FROM products WHERE subcat='".$categ."'";
    $response_cat = @mysqli_query($dbc, $query_cat);
    if ($dbc->error) {
        try {    
            throw new Exception("MySQL error $dbc->error <br> Query:<br> $query_cat", $dbc->errno);    
        } catch(Exception $e ) {
            echo "Error No: ".$e->getCode(). " - ". $e->getMessage() . "<br >";
            echo nl2br($e->getTraceAsString());
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
        <div class="slideshow">
        </div>
        <div class="content_page">
            <div class="row">
                    <p><span class=categ_title><?php echo $_GET["cat"]; ?></span></p>
            
                    <?php
                        if ($response_cat) {
                            $numrows = mysqli_num_rows($response_cat);
                            // echo '<script>alert("response ok - rows:'.$numrows.'");</script>';
                            while ($row = mysqli_fetch_array($response_cat)) {
                                echo    '<a href="product_page.php?id=' . $row["0"] . '"><div class="col-md-3 prodimage">
                                            <div class="col-md-12 prod"><img src="'.$row["4"] .'" alt="" /><h4>' . $row["1"] . ' <span class="prodprice">'.$row["3"].'€</span></h4></div>
                                        </div></a>';                                
                            }
                        } else {
                            echo '<script>alert('.$_categ.')</script>';
                        } 
                    ?>
                    
            </div>
        </div>

    <?php include 'footer.php'; ?>  
</div>
    
    
    
    
    
</body>
</html>