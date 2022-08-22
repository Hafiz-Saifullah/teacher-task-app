<?php

$id = $_POST['id'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$role_id = $_POST['role_id'];


if($id == 0){
    $query = "INSERT INTO `user` (`id`, `email`, `pass`, `role_id`) VALUES (NULL, '".$name."', '".md5($pass)."', '".$role_id."')";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=teachers');
    }
}else{
    $query = "UPDATE `user` SET `email` ='".$name."',`pass` ='".$pass."',`role_id` ='".$role_id."' WHERE `user`.`id` =".$id;
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=teachers');
    }
}