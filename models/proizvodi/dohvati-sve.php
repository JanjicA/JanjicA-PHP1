<?php

header("Content-Type: application/json");

require_once(__DIR__ . "/../../config/connection.php");

$proizvodi = $conn->query('SELECT * FROM pol po INNER JOIN proizvodi p ON po.id_pol=p.idPol INNER JOIN vrsta v ON p.idVrsta=v.id_vrsta')->fetchAll();

echo json_encode($proizvodi);
