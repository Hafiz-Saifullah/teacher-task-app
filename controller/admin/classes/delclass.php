<?php

$id = $_GET['id'];


    $query = "DELETE FROM `class` WHERE `class`.`id` = $id";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=classes');
    }
