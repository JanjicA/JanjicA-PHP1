<?php

//session_start();
header("Content-Type: application/json");

require_once (__DIR__ . "/../config/connection.php");


if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $query = $conn->prepare('SELECT * FROM pol po  INNER JOIN proizvodi p ON p.id=po.id_pol WHERE idPol = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $products =  $query->fetchAll();
        echo json_encode($products);
    } 
    catch (PDOException $e) {
        catchErrors($e->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(400);
}