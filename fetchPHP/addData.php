<?php 
session_start();
include('../includes/dbconnect.php');
$error = $message = "";
$sql = "UPDATE user set {$_GET['field']} = ?  WHERE `id` = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt,'si',$paramvalue,$paramid);
$paramvalue = $_GET['fieldvalue'];
$paramid = $_SESSION['userid'];
if(mysqli_stmt_execute($stmt)){
    $message = "Added Successfully";
    echo $message;
}else{
    $error = "failed to Update information";
    echo $error;
};


?>
