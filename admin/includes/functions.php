<?php



function __autoload($class){
$class= strtolower($class);
$path="includes/{$class}.php";

if(is_file($path)&& !class_exists($class)){
    include $path;
    
}

if(file_exists($path)){

    require_once($path);
}
die("This file named{$class}.php not found");

}


function redirect($location){
    return header("Location:{$location}");

}

?>