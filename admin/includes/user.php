<?php
class User extends Db_object{
    // Abstractin db tables
    protected static $db_table="users";
    protected static $db_table_fields=array('username','password', 'first_name','last_name');

    
    public $id;
    public $username;
    public $password;
    public $firstname;
    public $lastname;



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






protected function properties(){

    $properties=array();
    foreach (self::$db_table_fields as $db_field) {
if(property_exists($this,$db_field )){

    $properties[$db_field]= $this->$db_field;

}
return $properties;

    }
}




protected function clean_properties(){
// This espaces the inputes and prevents sql injection
global $database;
$clean_properties=array();
foreach ($this->properties() as $key => $value) {

$clean_properties[$key]=$database->escape_string($value);

}
return $clean_properties;

}

public function save(){
// abstraction users
    return isset($this->id)? $this->update(): $this->create();
}

 
// Create create method
public function create(){
    global $database;
$properties=$this->clean_properties();

    $sql="INSERT INTO " . self::$db_table. " ( ". implode("," , array_keys($properties))   . " ) ";
$sql.="VALUES(' ".      implode(" ','  " , array_values($properties))        ."  ' ) ";


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

    $properties=$this->clean_properties();
    $properties_pairs=array();
    foreach($properties as $key=>$value){
        $properties_pairs[]="{$key}='{$value}'";

    }
    
    $sql="UPDATE " . self::$db_table." SET ";
$sql .=implode(", ", $properties_pairs);
$sql .= " WHERE id=" . $database->escape_string($this->id);

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