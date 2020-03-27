<?php

header('Content-Type: application/json');

require_once (__DIR__ . "/../config/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $products = execute("SELECT * FROM proizvodi p INNER JOIN pol pi ON p.id=po.pol_id");
        echo json_encode($products);
    } catch (PDOException $e) {
        http_response_code(500);
    }
} else {
    http_response_code(400);
}