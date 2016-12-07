<html>
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
    
<?php

    if(isset($_POST['submit'])) {
        
        $data_missing = array();
        
        if(empty($_POST['firstname'])) {
            $data_missing[] = 'Primeiro Nome';
        } else {
            $f_name = trim($_POST['firstname']);
        }
        
        if(empty($_POST['lastname'])) {
            $data_missing[] = 'Último Nome';
        } else {
            $l_name = trim($_POST['lastname']);
        }
        
        if(empty($_POST['username'])) {
            $data_missing[] = 'User Name';
        } else {
            $u_name = trim($_POST['username']);
        }
        
        if(empty($_POST['email'])) {
            $data_missing[] = 'Email';
        } else {
            $email = trim($_POST['email']);
        }
        
        if(empty($_POST['password'])) {
            $data_missing[] = 'Password';
        } else {
            $pw = trim($_POST['password']);
        }
        
        if(empty($_POST['address'])) {
            $data_missing[] = 'Morada';
        } else {
            $address = trim($_POST['address']);
        }
        
        if(empty($_POST['postcode'])) {
            $data_missing[] = 'Código Postal';
        } else {
            $postcode = trim($_POST['postcode']);
        }
        
        if(empty($_POST['city'])) {
            $data_missing[] = 'Cidade';
        } else {
            $city = trim($_POST['city']);
        }
        
        if(empty($_POST['country'])) {
            $data_missing[] = 'País';
        } else {
            $country = trim($_POST['country']);
        }
    }
    
    if (empty($data_missing)) {
          require_once('connect.php');
          $query = "INSERT INTO users (username, firstname, lastname, email, password, address, postcode, city, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = mysqli_prepare($dbc, $query);
          mysqli_stmt_bind_param($stmt, "sssssssss", $u_name, $f_name, $l_name, $email, $pw, $address, $postcode, $city, $country);
          mysqli_stmt_execute($stmt);
          $affected_rows = mysqli_stmt_affected_rows($stmt);
          if($affected_rows == 1) {
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
            echo '<div class="success"><p><h1>Registo com Sucesso</h1></p><p><h3><a href="index.php">Voltar à página principal</a></h3></p></div>';
          } else {
              echo '<script>alert("Informação duplicada!");</script>';
        }
    } else {
        echo '<script>alert("Falta informação");</script>';
        foreach($datamissing as $missing) {
            echo "$missing<br>";
        }
    }

?>    
    
    
    
</body>
    
</html>