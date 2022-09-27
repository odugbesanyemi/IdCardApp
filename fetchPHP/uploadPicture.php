<?php 
session_start();
include('../includes/dbconnect.php');
$error = $message = "";

if(isset($_FILES['userImg'])){
    $filename = $_FILES["userImg"]["name"];
    $tempname = $_FILES["userImg"]["tmp_name"];
    $folder = "../assets/img/" . $filename;
    // Get all the submitted data from the form
    $sql = "UPDATE user SET picturename = ?, id_status = 'Pending' WHERE id = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"si",$paramPicturename,$paramuserid);
    $paramPicturename = $filename;
    $paramuserid = $_SESSION['userid'];
    if(mysqli_stmt_execute($stmt)){
        if (move_uploaded_file($tempname, $folder)) {
            echo "Image uploaded successfully!";
        } else {
            echo "Failed to upload image!";
        }    
    }else{
        echo "can't update data";
    };
}



?>