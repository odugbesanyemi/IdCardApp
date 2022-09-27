<?php 

// connect the database
$host = "localhost";
$user  = "root";
$password = "";
$dbName = "idme";

$conn= mysqli_connect($host,$user,$password,$dbName);
if(!$conn){
    die('Error Connecting to database');
}

?>