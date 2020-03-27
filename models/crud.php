<?php 

if(isset($_SESSION['user'])){
    if($_SESSION['user']->ulogaId != 1){
        header("Location: index.php");
    }
}else{
    header("Location: index.php");
}

require_once (__DIR__ . "/../../config/connection.php");

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $opis = $_POST['opis'];
    $slika = $_POST['slika'];
    $cena = $_POST['cena'];

    $unosKorisnika = $conn->prepare("INSERT INTO proizvodi VALUES ('$name', '$opis', '$slika', '$cena')" );
        
        try{
            $unosKorisnika->execute([$name, $opis, $slika, $cena]);

            $_SESSION['uspeh'] = ["Uspesno ste se registrovali!"];
            header("Location: ../index.php");
        }

        //kad bacim na stranicuda se logovao ide ono page=...

        catch(PDOException $e){
            $_SESSION['greske'] = ["Doslo je do greske!"];
            var_dump($_SESSION['greske']);
        }
} 
else
{
    $_SESSION['greske'] = ["Vec postoji korisnik sa tim email!"];
}

$sviproizvpodi12 = $conn->query("SELECT *  FROM proizvodi")->fetchAll();

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    try{
        $upit = $conn->prepare("DELETE FROM proizvodi WHERE id = ?");
        $upit->execute([$id]);
        
    }catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}
    

?>