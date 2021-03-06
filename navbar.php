<nav class="navbar navbar-inverse navbar-fixed-top"> 
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">PrimeTek</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">PCs<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="categ_page.php?cat=desktop">Desktops</a></li>
                    <li><a href="categ_page.php?cat=laptop">Portateis</a></li>
                    <li><a href="categ_page.php?cat=aio">All-in-One</a></li>
                    <li><a href="categ_page.php?cat=minipc">Mini PC's</a></li>
                    <li><a href="categ_page.php?cat=raspberry">Raspberry Pi</a></li>
                    <li><a href="categ_page.php?cat=server">Servidores</a></li>
                  </ul>
                </li>
                
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Componentes<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="categ_page.php?cat=cpu">Processadores</a></li>
                    <li><a href="categ_page.php?cat=mb">Motherboards</a></li>
                    <li><a href="categ_page.php?cat=gpu">Placas Gráficas</a></li>
                    <li><a href="categ_page.php?cat=ram">Memória</a></li>
                    <li><a href="categ_page.php?cat=psu">Fontes de Alimentação</a></li>
                    <li><a href="categ_page.php?cat=box">Caixas</a></li>
                    <li><a href="categ_page.php?cat=heat">Dissipadores</a></li>
                    <li><a href="categ_page.php?cat=fan">Ventoínhas</a></li>
                    <li><a href="categ_page.php?cat=net">Networking</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Periféricos<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="categ_page.php?cat=headsets">Headsets</a></li>
                    <li><a href="categ_page.php?cat=hphones">Headphones</a></li>
                    <li><a href="categ_page.php?cat=earphones">Auriculares</a></li>
                    <li><a href="categ_page.php?cat=mic">Microfones</a></li>
                    <li><a href="categ_page.php?cat=colunas">Colunas</a></li>
                    <li><a href="categ_page.php?cat=acess">Acessórios</a></li>
                    <li><a href="categ_page.php?cat=mouse">Ratos</a></li>
                    <li><a href="categ_page.php?cat=kb">Teclados</a></li>
                    <li><a href="categ_page.php?cat=screen">Monitores</a></li>
                    <li><a href="categ_page.php?cat=printer">Impressoras</a></li>
                  </ul>
                </li>

                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Armazenamento<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="categ_page.php?cat=ssd">SSD</a></li>
                    <li><a href="categ_page.php?cat=hdd">HDD</a></li>
                    <li><a href="categ_page.php?cat=extusb25">Discos Externos USB 2.5"</a></li>
                    <li><a href="categ_page.php?cat=extusb35">Discos Externos USB 3.5"</a></li>
                    <li><a href="categ_page.php?cat=sd">Cartões SD</a></li>
                    <li><a href="categ_page.php?cat=msd">Cartões MicroSD</a></li>
                    <li><a href="categ_page.php?cat=cf">Cartões CompactFlash</a></li>
                    <li><a href="categ_page.php?cat=pen">Pen Drives</a></li>
                  </ul>
                </li> 
            </ul>        
            <ul class="nav navbar-nav navbar-right"> 
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="searchmenu">
                            <form action="search.php" method="get">
                                <input class="searchinput" type="text" name="searchtext" size="30" autofocus="autofocus">
                                <button type="submit" name="searchsubmit" class="btn btn-default">Procurar</button>
                            </form>
                        </div>
                    </ul> 
                </li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>
                        <?php 
                        if (empty($_SESSION["logged"])) {
                            echo 'Login';
                        } else {
                            echo '' .$_SESSION["user"]. '';
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <?php 
                        if (empty($_SESSION["logged"])) {
                        echo '<div class="loginmenu">
                                <form method="post" action="login.php">
                                  <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                  </div>
                                  <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" class="form-control" name="password" id="pwd">
                                  </div>
                                  <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                  </div>
                                  <p class="note">Ou <a href="register_page.php">Registe-se</a></p>
                                  <button type="submit" name="login" class="btn btn-default">Entrar</button>
                                </form>
                            </div>
                            ';
                        } else if ($_SESSION["logged"] == 1) {
                            echo    '<div class="loggedmenu">
                                        <form method="post" action="logout.php">
                                            <li><p>Obrigado pela visita!</p></li>
                                            <li><button type="submit" name="logout" class="btn btn-default">Sair</button></li>
                                        </form>
                                    </div>';
                            }
                        ?>
                    </ul>
                </li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-shopping-cart">
                        </span>
                        Carrinho  
                        <?php
                                if (!empty($_SESSION['cart'])) {
                                    echo '(' .count($_SESSION['cart']['id']) .')';
                                }
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <div class="cartmenu">
                            <li><a href="cart.php"><button class="btn btn-default seecart">Ver carrinho</button></a></li>
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
                                } else {
                                    echo 'Carrinho vazio, adicione items!';
                                }
                            ?>
                            <br><li class="total">Total: <?php
                                if (!empty($_SESSION['cart']))
                                    echo number_format($total, 2); 
                            ?>€</li><br>
                            <li><a href="checkout.php"><button class="checkout_btn btn btn-default">Checkout</button></a></li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>