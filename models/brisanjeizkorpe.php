<?php
if($_SERVER["REQUEST_METHOD"] != 'GET'){
    http_response_code(404);
    exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once (__DIR__ . "/../config/connection.php");

    try{
        $upit = $conn->prepare("DELETE FROM korpa WHERE idKorpa = ?");
        $upit->execute([$id]);
        http_response_code(204);
    
    }
    catch(PDOException $e){
        $e->getMessage();
        http_response_code(500);
    }

}else{
    http_response_code(400);
}

