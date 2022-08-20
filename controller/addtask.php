<?php

$user_id = $_POST['user_id'];
$class_id = $_POST['class_id'];
$date = $_POST['date'];
$task = $_POST['task'];
$task_id = $_POST['task_id'];


if($task_id == 0){
    $query = "INSERT INTO `task` (`id`, `class_id`, `user_id`, `dis`, `date`) VALUES (NULL, '".$class_id."', '".$user_id."', '".$task."', '".date("Y-m-d",strtotime($date))."')";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=home');
    }
}else{
    $query = "UPDATE `task` SET `dis` ='".$task."' WHERE `task`.`id` =".$task_id;
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=home');
    }
}

