<?php
function getdb(){
$servername = "localhost";
$username 	= "root";
$password 	= "root";
$db 		= "punjabnet_records";
try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
