<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resource/css/style.css?r=8232">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>

<div class="sidebar">
  <h1>Task Sheduler</h1>
  <?php
    if((int)$_SESSION['role_id'] == 1){
      ?>
       <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'dashboard')? 'active':'';?>" href="?n=dashboard">Dashboard</a>
        <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'teachers')? 'active':'';?>" href="?n=teachers">Teachers</a>
        <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'classes')? 'active':'';?> <?php echo (isset($_GET['n']) && $_GET['n'] == 'home' && $_SESSION['islogin'])? 'active':'';?>" href="?n=classes">Classes</a>
        <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'roles')? 'active':'';?>" href="?n=roles">Roles</a>
        <?php
    }else{
      ?>
      <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'login')? 'active':'';?> <?php echo (isset($_GET['n']) && $_GET['n'] == 'home' && $_SESSION['islogin'])? 'active':'';?>" href="?n=login">Teacher View</a>
      <?php
    }
    ?>
  
 
    <?php
    if($_SESSION['islogin']){
      ?>
        <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'chpass')? 'active':'';?>" href="?n=chpass">Change Password</a>
        <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'logout')? 'active':'';?>" href="?n=logout">Logout</a>
        <?php
    }else{
      ?>
       <a class="<?php echo (isset($_GET['n']) && $_GET['n'] == 'home')? 'active':'';?>" href="?n=home">Student View</a>
      <?php
    }
    ?>

</div>

