<?php 
include('../includes/dbconnect.php');
session_start();
$error = $message = "";
// signup script
if(isset($_POST['submit-btn'])){
    // user is registering
    // first check if data is already in database
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$paramusername);
    $paramusername = $_POST['username'];
    mysqli_stmt_execute($stmt);// mysqli_query()
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
        // which means username already exists
        $error = "Username Already exists!";
        $_SESSION['error'] = $error;
        header('location:'.$_SERVER['HTTP_REFERER']);

    }else{
        // meaning user does not exist continue with registration
        $sql = "INSERT INTO user(username, password) VALUES(?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stmt,'ss',$paramusername, $parampassword);
        $paramusername = $_POST['username'];
        $parampassword = password_hash($_POST['password'],PASSWORD_DEFAULT);
        if(mysqli_stmt_execute($stmt)){
            $message = "Successfully Registered";
            $_SESSION['message'] = $message;
            header('location:'.$_SERVER['HTTP_REFERER']);  
        }else{
            $error = "FATAL ERROR! Contact Admin";
            $_SESSION['error'] = $error;
            header('location:'.$_SERVER['HTTP_REFERER']);            
        };
        
    }
}

if(isset($_POST['sign-in'])){
    // user is signin-in
    // first check if username is already in database
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt,"s",$paramusername);
    $paramusername = $_POST['username'];
    mysqli_stmt_execute($stmt);// mysqli_query()
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
        // which means username already exists
        // check if password matches with user given password
        $userPassword = $_POST['password'];
        while ($row = mysqli_fetch_array($result)){
            if (password_verify($userPassword,$row['password'])){
                // meaning password matches
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['userid'] = $row['id'];
                header('location:../index.php');
            }else{
                $error = "Username or Password do not match";
                $_SESSION['error'] = $error;
                header('location:'.$_SERVER['HTTP_REFERER']);                
            }
        }
    }else{
        // User not found Tell user to register for account
        $error = "Encountered An Error Try Again!";
        $_SESSION['error'] = $error;
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}

?>