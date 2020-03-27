<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="cipele";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    echo "aaaaaa";
    die("Connection failed: " . $conn->connect_error);
}
echo "";



class Proizvodi{

    public function __construct(){
        
    }
    public function getProducts($conn){
        $sql = "SELECT *  FROM proizvodi";
        $result = $conn->query($sql);
        return $result;
    }
    public function getProductsLimit($conn, $limit){
        $sql = "SELECT *  FROM proizvodi limit $limit";
        $result = $conn->query($sql);
        return $result;
    }

    public function single($conn, $id){
        $sql = "SELECT *  FROM proizvodi where id=$id ";
        $result = $conn->query($sql);
        return $result;
    }


}


?>