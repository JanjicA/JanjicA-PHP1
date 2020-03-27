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


class Meni{
    public function __constract(){
        
    }
    public function getMeni($conn){
        $sql = "SELECT *  FROM meni";
        $result = $conn->query($sql);
        return $result;
    } 
}

?>