<?php

header("Content-Type: application/json");

require_once (__DIR__. '/../../config/connection.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $uloge = $_POST['uloga'];
    $datum = date("Y-m-d H:i:s");
    $password = md5($password);

    try{
        $query = $conn->prepare("UPDATE korisnici SET name = ?, username = ?, email = ?, password = ?, datum = ? , ulogaId = ? WHERE id_korisnik = ?");

        $query->execute([$name, $username, $email, $password, $datum, $uloge, $id]);
        http_response_code(204);
    }catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}