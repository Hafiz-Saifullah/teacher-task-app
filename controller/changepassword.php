<?php
session_start();

$user_id = $_SESSION['user_id'];
$pass = $_POST['pass'];

$query = "UPDATE `user` SET `pass` ='".md5($pass)."' WHERE `user`.`id` =".$user_id;
$run = mysqli_query($con,$query);

if($run){
    header('location:?n=chpass');
}
