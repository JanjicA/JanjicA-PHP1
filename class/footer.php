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


class Footer{
    public function __constract(){
        
    }
    public function getFooter($conn){
        $sql = "SELECT *  FROM footer";
        $result = $conn->query($sql);
        return $result;
    } 
}

?>