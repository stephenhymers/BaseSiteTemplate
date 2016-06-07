<?php

include('inc/header.php');

// autoload the classes
function __autoload($class_name){
    if(file_exists('classes/'. $class_name .'.class.php')){
        require_once('classes/'. $class_name .'.class.php');
    }
}

if(empty($_GET['page'])){
    $page = 'index';
}
else{
    $page = $_GET['page'];
}
if(file_exists('views/'. $page .'.php')){
    include('views/'. $page .'.php');
}
else {
    echo 'views/'. $page .'.php';
    include('views/404.php');
}

include('inc/footer.php'); 

?>
