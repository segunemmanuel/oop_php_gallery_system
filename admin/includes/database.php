<?php

require_once("new_config.php");
class Database{
    public $connection;

    function __construct()
    {
        $this->open_db_conn();
    }

    // OPEN DB CONNECION
    public function open_db_conn(){
        // $this->connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        $this->connection=new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

        if($this->connection->errno){
            die("Failed".$this->connection->connect_error);
        }
}    

// DATABSE QUERY
public function query($sql){

$result=$this->connection->query($sql);
$this->confirm_query($result);
return $result;
}
// CONFIRM DB QUERY;
private function confirm_query($result){
    if(!$result){
        die("Failed". $this->connection->connect_error);
    }
 
}
// DB ESCAPE STRING
public  function escape_string($string){
$esacped_string=$this->connection->real_escape_string($string);
return $esacped_string;
}
public function the_insert_id(){
    return $this->connection->insert_id;
}
}



$database=new Database;

?>