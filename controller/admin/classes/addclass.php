<?php

$id = $_POST['id'];
$name = $_POST['name'];


if($id == 0){
    $query = "INSERT INTO `class` (`id`, `clas_name`) VALUES (NULL, '".$name."')";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=classes');
    }
}else{
    $query = "UPDATE `class` SET `clas_name` ='".$name."' WHERE `class`.`id` =".$id;
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=classes');
    }
}