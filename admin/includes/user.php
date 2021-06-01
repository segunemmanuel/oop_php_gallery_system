<?php
class User{

    public $id;

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



}





?>