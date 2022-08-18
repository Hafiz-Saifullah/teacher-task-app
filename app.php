<?php
$boot = require('bootstrap.php');


$route_name = isset($_GET['n']) ? $_GET['n'] :'';
if(!empty($route_name) && $route_name != ''):
    $route = $boot[$route_name];
    include($route);
else:
    include('resource/view/index.php');
endif;

?>