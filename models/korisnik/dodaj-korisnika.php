<?php


require_once (__DIR__. '/../../config/connection.php');

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['uloga'])){

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['uloga'];
    $password = md5($password);
    $datum = date("Y-m-d H:i:s");

    try {
        $query = $conn->prepare("INSERT INTO korisnici VALUES (NULL, ?, ?, ?, ?, ?, (SELECT id FROM uloge WHERE id = ?))");
        $query->execute([$username, $email, $password, $name, $datum, $role]);
        http_response_code(201);
    }catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}