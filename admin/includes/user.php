<?php
class User{
    // Abstractin db tables
    protected static $db_table="users";
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
  $the_result_array=self::find_this_query("SELECT * FROM users WHERE id ={$id}");
  return !empty($the_result_array) ?  array_shift($the_result_array) : false;
//   return $found_user; 

}
public static function find_this_query($sql){
    global $database;
    $result_set=$database->query($sql);
    $the_object_array=array();
    while($row=mysqli_fetch_array($result_set)){
$the_object_array[]=self::instantiation($row);

}
    return $the_object_array;
}



public static function verify_user($username, $password ) {
    global $database;

    $username = $database->escape_string($username);
    $password = $database->escape_string($password);


    $sql = "SELECT * FROM users  WHERE ";
    $sql .= "username = '{$username}' ";
    $sql .= "AND password = '{$password}' ";
    $sql .= "LIMIT 1";

    $the_result_array = self::find_this_query($sql);

    return !empty($the_result_array) ? array_shift($the_result_array) : false;



    



}




public static function instantiation($the_record){

$the_object=new self;

foreach ($the_record as $the_attribute => $value) {

if($the_object-> has_the_attribute ($the_attribute)) {

$the_object->$the_attribute = $value;
}
}
 
return $the_object;
}

private function has_the_attribute($the_attribute){
 $object_prop=get_object_vars($this);

return array_key_exists($the_attribute,$object_prop);


}





protected function properties(){
    return get_object_vars($this);
}



public function save(){
// abstraction users
    return isset($this->id)? $this->update(): $this->create();
}




 
// Create create method
public function create(){
    global $database;
$properties=$this->properties();

    $sql="INSERT INTO " . self::$db_table." (". implode("," , array_keys($properties))   .")";
$sql.="VALUES('".      implode("," , array_values($properties))        ."')";





if($database->query($sql)){
    $this->id=$database->the_insert_id();
    return true;

}
else{
return false;
}
 



}

// Create user update method;

public function update(){
    global $database;
    $sql="UPDATE " . self::$db_table." SET ";
$sql .= "username='".$database->escape_string($this->username)  . " ', ";
$sql .= "password='".$database->escape_string($this->password)   ." ', ";
$sql .= "first_name='".$database->escape_string($this->firstname) ." ', ";
$sql .= "last_name='".$database->escape_string($this->lastname)  ." ' ";
$sql .= " WHERE id=".$database->escape_string($this->id);
$database->query($sql);

return  (mysqli_affected_rows($database->connection) == 1) ? true: false;



}

public function delete(){
    global $database;
    $sql="DELETE  FROM  ". self::$db_table." ";
$sql .= "WHERE id=".$database->escape_string($this->id);
$sql.= " LIMIT 1";
$database->query($sql);
return  (mysqli_affected_rows($database->connection) == 1) ? true: false;
}


}
// End of user





$user=new User;



?>