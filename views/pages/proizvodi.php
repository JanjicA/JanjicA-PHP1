<?php

require_once (__DIR__ . "/../../config/connection.php");

$id = $_GET['id'];
$single = $conn->prepare("SELECT *  FROM proizvodi WHERE id = :id");
$single->bindParam(':id', $id);

$exe = $single->execute();
if($exe){
   $nesto = $single->fetch();
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-6 slikaproizvod text-right">
            <img src="assets/images/<?=$nesto->slika ?>" alt="slika"/>
            
        </div>
         
        <div class="col-lg-6 col-md-6 col-xs-6 tekstproizvod text-left">    
            <h4 class="nazivproizvod"><?=$nesto->name ?></h4>
            <h2 class="nazivproizvod"><?=$nesto->cena ?>din</h2>
            <?php if(isset($_SESSION['user'])) : ?>
                <a href="index.php?page=korpa" id="korpa" class="btn btn-danger text-center" data-id="<?=$nesto->id ?>" data-user="<?=$_SESSION['user']->id_korisnik ?>">Add to cart</a>
            <?php endif; ?>
            <?php if(!isset($_SESSION['user'])) : ?>
                <a href="index.php?page=register" id="register" class="btn btn-danger text-center">Register now!</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center nazad">
      
            <a href="index.php?page=gallery" class="btn btn-nazad text-center">Back to Gallery</a>
        </div>
    </div>
</div>



