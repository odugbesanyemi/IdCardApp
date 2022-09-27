<?php 
session_start();
include('../includes/dbconnect.php');
// get user data from DATABASE
if(isset($_GET['getALL'])){
    // return a json array of data information
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"i",$paramuserID);
    $paramuserID = $_SESSION['userid'];
    mysqli_stmt_execute($stmt);
    $userData = [];
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_array($result)){
        array_push($userData,$row);
    }

   echo json_encode($userData);
}

?>