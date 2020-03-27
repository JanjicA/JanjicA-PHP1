<body>
    <header>
        <div class="celasirina">
            <div class="container headergore">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <a href="index.php"><h1 class="h1dole">FOOSESHOES</h1></a>
                    </div>

                    <div class="col-lg-6 col-md-4 col-xs-12 meniprvi krije">
                        <input type="text" placeholder="Search"/><img src="assets/images/lupa.png"/>
                        <?php if(isset($_SESSION['user'])) : ?>
                            <a href="models/logout.php"><button type="button" class="btn btn-secondary registracija">LOGOUT</button></a>
                        <?php else: ?>
                        <a href="index.php?page=register"><button type="button" class="btn btn-secondary registracija">REGISTER</button></a>
                        <a href="index.php?page=login"><button type="button" class="btn btn-secondary registracija">LOGIN</button></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php
            $meni = $conn->query("SELECT * FROM meni")->fetchAll();
            $pdo = $conn->query("SELECT * FROM korisnici")->fetchAll();
        ?>

        <div class="container krije">
            <div class="row">
                <div class="col-lg-8 col-md-8 menidrugi">
                    <ul>
                    <?php foreach($meni as $m):?>
                        <li><a href="<?=$m->link?>"><?=$m->name?></a></li>
                    <?php endforeach ?>

                    <?php 
                        if(isset($_SESSION['user'])){
                            if($_SESSION['user']->ulogaId == 1){
                                echo "<li><a href='index.php?page=admin'>Admin</a></li>";
                            }
                        }
                    ?>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4 menitreci krije">
                    <ul>
                        <?php 
                            if(isset($_SESSION['user'])):
                                echo $_SESSION["user"]->name;
                            ?>
                                <li><a href='index.php?page=korpa'><img src='assets/images/korpa.png' alt='zvezdica'/></a></li>
                            <?php endif; ?>
                    </ul>
                </div>
            </div>  
        </div>

        <div class="container nema ima">
            <div class="row">
                <div class="col-xs-6 menidrugi menimobile">
                    <ul>
                        <li>LOGIN</li>
                    </ul>
                </div>

                <div class="col-xs-6 menimobile">
                    <div class="dropdown">
                        <img src="images/menu.png" alt="zvezdica" class="dropbtn" style="width:50px; height:50px"/>
                            <div class="dropdown-content">
                                <a href="">Home</a>
                                <a href=""> Products</a>
                                <a href=""> About</a>
                                <a href=""> Pages</a>
                                <a href=""> Blog</a>
                                <a href=""> Contact Us</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

   
