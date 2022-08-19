<?php
session_start();

$email = $_POST['email'];
$pass = $_POST['pass'];

$query = "SELECT * FROM `user` WHERE email = '".$email."' AND pass ='".md5($pass)."'";
$run = mysqli_query($con,$query);

if(mysqli_num_rows($run) > 0){
    $user = mysqli_fetch_assoc($run);
    $_SESSION['islogin'] = 1;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['role_id'] = $user['role_id'];
    header('location:?n=home');
}else{
    $_SESSION['error'] = "Email or password incorecct";
    header('location:?n=login');
}

