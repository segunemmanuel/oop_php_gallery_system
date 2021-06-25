<?php
require_once("init.php");
?>

<?php

if($session->is_signed_in()){
redirect("index.php");

}

if(isset($_POST['submit'])){
$username=trim($_POST['username']);
$password=trim($_POST['password']);


// method to check the db user;
$user_foundUser::verify_user($username,$password);



if($user_found){
$session->login($user_found);
redirect("index.php");

}else{

    $the_msg="Your password or username are incorrect";
    

}

}
else{
    $username="";
    $password="";


}

?>