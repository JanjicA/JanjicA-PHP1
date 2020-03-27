<?php

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    require_once(__DIR__ . '/../../config/connection.php');

    $id = $_GET['id'];

    try {
        $query = $conn->prepare("SELECT * FROM pol po INNER JOIN proizvodi p ON po.id_pol=p.idPol INNER JOIN vrsta v ON p.idVrsta=v.id_vrsta WHERE p.id = ?");
        $query->execute([$id]);
        $proizvodi = $query->fetch();

        echo json_encode($proizvodi);
    } catch (PDOException $e) {
        $e->getMessage();
        http_response_code(500);
    }
} else {
    http_response_code(400);
}