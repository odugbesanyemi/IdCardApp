<?php 
session_start();
include('../includes/dbconnect.php');

 $sql = "SELECT * FROM {$_GET['tablename']} ";
 $stmt = mysqli_prepare($conn,$sql);
 mysqli_stmt_execute($stmt);
 $Data = [];
 $result = mysqli_stmt_get_result($stmt);
 while($row = mysqli_fetch_array($result)){
     array_push($Data,$row);
 }

echo json_encode($Data);
?>
