<?php
    $databasename='cipele';
    $username='root';
    $passw='';
    $server='localhost';

    try {
        $conn = new PDO("mysql:host=".$server.";dbname=".$databasename.";charset=utf8", $username, $passw);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $ex){
        echo $ex->getMessage();
    }
    
    function executeQuery($query){
        global $conn;
        return $conn->query($query)->fetchAll();
    }
?>