<?php

$id = $_POST['id'];
$name = $_POST['name'];


if($id == 0){
    $query = "INSERT INTO `role` (`id`, `role`) VALUES (NULL, '".$name."')";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=roles');
    }
}else{
    $query = "UPDATE `role` SET `role` ='".$name."' WHERE `role`.`id` =".$id;
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=roles');
    }
}
