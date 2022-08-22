<?php

$id = $_GET['id'];


    $query = "DELETE FROM `user` WHERE `user`.`id` = $id";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=teachers');
    }
