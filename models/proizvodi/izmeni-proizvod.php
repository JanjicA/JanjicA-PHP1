<?php

require_once (__DIR__. '/../../config/connection.php');

if(isset($_POST['change'])){
    $id = $_POST['hdnChange'];
    $image1 = $_FILES['slika1']['name'];
    $name1 = $_POST['name1'];
    $cena1 = $_POST['cena1'];
    $opis1 = $_POST['opis1'];
    $vrsta1 = $_POST['vrsta1'];
    $pol1 = $_POST['pol1'];

    $fullName = "assets/images/" . $image;

    try{
        $query = $conn->prepare("UPDATE proizvodi SET name = ?, opis = ?, slika = ?, cena = ?, idPol = ?, idVrsta = ? WHERE id = ?");
        $products = $query->execute([$name1, $opis1, $image1, $cena1, $pol1, $vrsta1, $id]);

        if($products){
            move_uploaded_file($_FILES['slika1']['tmp_name'], "../../assets/images/".$image1);
        }

        header("Location: ../../index.php?page=admin");
    }catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}
