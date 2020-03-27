<?php

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    require_once(__DIR__ . '/../../config/connection.php');

    $id = $_GET['id'];

    try {
        $query = $conn->prepare("SELECT k.*, u.id FROM korisnici k INNER JOIN uloge u ON k.ulogaId=u.id WHERE k.id_korisnik = ?");
        $query->execute([$id]);
        $korisnik = $query->fetch();

        echo json_encode($korisnik);
    } catch (PDOException $e) {
        $e->getMessage();
        http_response_code(500);
    }
} else {
    http_response_code(400);
}