<?php

$user_id = $_POST['user_id'];
$class_id = $_POST['class_id'];
$date = $_POST['date'];
$task = $_POST['task'];



if($task_id == 0){
    $query = "INSERT INTO `task` (`id`, `class_id`, `user_id`, `des`, `date`) VALUES (NULL, '".$class_id."', '".$user_id."', '".$task."', '".date("Y-m-d",strtotime($date))."')";
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=home&month='.date('Y-m',strtotime($date)).'&class_id='.$class_id);
    }
}else{
    $query = "UPDATE `task` SET `des` ='".$task."' WHERE `task`.`id` =".$task_id;
    $run = mysqli_query($con,$query);
    
    if($run){
        header('location:?n=home&month='.date('Y-m',strtotime($date)).'&class_id='.$class_id);
    }
}

