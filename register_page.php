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
    <div class="registerform">
        <div class="row">
            <form action="register.php" method="post">
                <div class="col-md-6">
                    <h2>Dados Pessoais</h2>
                    <p>Primeiro Nome:<br><input type="text" name="firstname" size="30" required /></p>
                    <p>Último Nome:<br><input type="text" name="lastname" size="30" required /></p>
                    <p>Nome de Utilizador :<br><input type="text" name="username" size="30" required /></p>
                    <p>Email:<br><input type="email" name="email" size="30" required /></p>
                    <p>Palavra-passe:<br><input type="password" name="password" size="30" required /></p>
                </div>
                <div class="col-md-6">
                    <h2>Endereço</h2>
                    <p>Rua/Avenida/Praça:<br><input type="text" name="address" size="50" required /></p>
                    <p>Código Postal:<br><input type="text" name="postcode" size="15" required /></p>
                    <p>Cidade:<br><input type="text" name="city" size="30" required /></p>
                    <p>País:<br><input type="text" name="country" size="30" required /></p>
                    
                    <br><br><button type="submit" name="submit" class="regbutton btn btn-default">Registar</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>   
    
</div>
    
  
</body>
</html>