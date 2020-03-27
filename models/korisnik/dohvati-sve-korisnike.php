<?php

header("Content-Type: application/json");

require_once(__DIR__ . "/../../config/connection.php");

$korisnici = $conn->query('SELECT k.*, u.id FROM korisnici k INNER JOIN uloge u ON k.ulogaId=u.id')->fetchAll();

echo json_encode($korisnici);
