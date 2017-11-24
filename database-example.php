<?php
$servername = "217.199.187.189:3306";
$username = "cl54-tommyt12";
$password = "MV!d7YWNF";

try {
    $conn = new PDO("mysql:host=$servername;dbname=cl54-tommyt12;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

