<?php
class User{

    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;
public static function find_all_users(){
 return self::find_this_query("SELECT * FROM users");
}
public static function find_all_users_by_id($id){
    global $database;
  $result_back=self::find_this_query("SELECT * FROM users WHERE id ={$id}");
    $found_user=mysqli_fetch_array($result_back);
    return $found_user;

}
public static function find_this_query($sql){
    global $database;
    $result_set=$database->query($sql);
    return $result_set;


}

public static function instantiation(){
    $result_get=User::find_all_users_by_id(3);
// echo $result_get['username'];
$the_object=new self;
$the_object->id=$result_get['id'];
$the_object->username=$result_get['username'];
$the_object->password=$result_get['password'];
$the_object->firstname=$result_get['first_name'];
$the_object->lastname=$result_get['last_name'];

return $the_object;
}

}





?>