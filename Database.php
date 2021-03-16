<?php 

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "Contact";


$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn){
    die("database connection failed");
} 



?>