<?php

if(!$_GET['n']){
    header('location:?n=login');
}
require 'db.php';

require 'app.php';

