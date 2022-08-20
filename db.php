<?php

$host_name = 'localhost';
$user_name = 'root';
$pass = '';
$db = 'cetask';

$con = mysqli_connect($host_name, $user_name, $pass,$db) or die("Connect failed");

// 
function url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      explode("?",$_SERVER['REQUEST_URI'])[0]
    );
  }