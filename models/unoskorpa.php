<?php

header('Content-Type: application/json');

require_once (__DIR__ . "/../config/connection.php");

if(isset($_POST['korisnik'])){
    $korisnik = $_POST['korisnik'];
    $proizvod = $_POST['proizvod'];

    try{
        $upit = $conn->prepare("SELECT * FROM korpa WHERE idKorisnik = ? AND idProizvod = ?");
        $upit->execute([$korisnik, $proizvod]);

        $brojreda = $upit->rowCount();

        if($brojreda == 1){
            $jedan = $conn->prepare("SELECT * FROM korpa WHERE idKorisnik = ? AND idProizvod = ?");
            $jedan->execute([$korisnik, $proizvod]);
            $result = $jedan->fetch();

            $kolicina = $result->kolicina;
            $kolicina++;

            $update = $conn->prepare("UPDATE korpa SET kolicina = ? WHERE idKorisnik = ? AND idProizvod = ?");
            $update->execute([$kolicina, $korisnik, $proizvod]);

            http_response_code(200);
        }
        else
        {
            $insert = $conn->prepare("INSERT INTO korpa VALUES (NULL, 1, ?, ?)");
            $insert->execute([$korisnik, $proizvod]);
            http_response_code(200);
        }
    }
    catch(PDOException $e)
    {
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}

