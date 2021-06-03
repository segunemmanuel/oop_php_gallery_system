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

public static function instantiation($the_record){

$the_object=new Self;

foreach ($the_record as $the_attribute => $value) {

if($the_object-> has_the_attribute ($the_attribute)) {

$the_object->the_attribute = $value;




}


}




// $the_object->id=$found_user['id'];
// $the_object->username=$found_user['username'];
// $the_object->password=$found_user['password'];
// $the_object->firstname=$found_user['first_name'];
// $the_object->lastname=$found_user['last_name'];
return $the_object;
}

private function has_the_attribute($the_attribute){

    $object_prop=get_object_vars($this);

return array_key_exists($the_attribute,$object_prop);


}



}





?>