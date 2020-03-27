<?php
header("Content-Type: application/json");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    require_once (__DIR__ . "/../../config/connection.php");

    try{
        $query = $conn->prepare("DELETE FROM proizvodi WHERE id = ?");
        $query->execute([$id]);
        http_response_code(204);
    }
    catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }
}else{
    http_response_code(400);
}