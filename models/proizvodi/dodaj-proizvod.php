<?php

require_once (__DIR__. '/../../config/connection.php');

if(isset($_POST['save'])){
    $image = $_FILES['slika']['name'];
    $name = $_POST['name'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
    $vrsta = $_POST['vrsta'];
    $pol = $_POST['pol'];

    $fullName = "assets/images/" . $image;

    try{
        $query = $conn->prepare("INSERT INTO proizvodi VALUES (NULL, ?, ?, ?, ?, (SELECT id_pol FROM pol WHERE id_pol = ?), (SELECT id_vrsta FROM vrsta WHERE id_vrsta = ?))");
        $proizvodi = $query->execute([$name, $opis, $image, $cena, $pol, $vrsta]);

        if($proizvodi){
            move_uploaded_file($_FILES['slika']['tmp_name'], "../../assets/images/".$image);
        }

        header("Location: ../../index.php?page=admin");
    }catch(PDOException $e){
        $e->getMessage();
        header("Location: ../../index.php?page=admin");
      
       
    }
}else{
    http_response_code(400);
}

// $query = $conn->prepare("INSERT INTO proizvodi VALUES (NULL, :ime, :opis, :slika, :cena, (SELECT id_pol FROM pol WHERE id_pol = :id_pol), (SELECT id FROM vrsta WHERE id = :id_vrsta))");
//         $query->bindParam(":ime", $name);
//         $query->bindParam(":opis", $alt);
//         $query->bindParam(":nameProd", $nameProd);
//         $query->bindParam(":price", $price);
//         $query->bindParam(":id", $id);