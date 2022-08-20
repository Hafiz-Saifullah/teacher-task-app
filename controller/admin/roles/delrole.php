<?php

$id = $_GET['id'];


    $query = "DELETE FROM `role` WHERE `role`.`id` = $id";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=roles');
    }
