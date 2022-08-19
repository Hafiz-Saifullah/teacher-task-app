<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resource/css/style.css?r=8232">
    <title>Document</title>

</head>
<body>

<div class="sidebar">
  <h1>Task Sheduler</h1>
  <a class="active" href="?n=login">Teacher View</a>
  <a href="?n=home">Student View</a>
    <?php
    if($_SESSION['islogin']){
      ?>
        <a href="">Change Password</a>
        <a href="?n=logout">Logout</a>
        <?php
    }
    ?>

</div>

