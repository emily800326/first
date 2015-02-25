<?php

class db{

    public $host = 'localhost';//140.115.126.235
    public $username = 'root';
    public $password = 'ytwu57874';
    public $database = 'first';
    public $result;

    function __construct(){
        $this->sql_connect();
        $this->sql_database();
        $this->set_db_encode();
    }

    function sql_connect(){
        return @mysql_connect($this->host,$this->username,$this->password);
    }

    function sql_database(){
        return @mysql_select_db($this->database);
    }

    function set_db_encode(){
        return mysql_query("SET NAMES 'utf8'");
    }
     function query($sql_string){
        $result = mysql_query($sql_string);
        $query = new db_query($result);
        return $query;
    }

}

class db_query{

    private $result;

    function __construct($result){
        $this->result = $result;
    }

    function result(){
        $query = array();
        if($this->result != false){
            while($row = mysql_fetch_object($this->result)){
                $query[] = $row;
            }
            return $query;
        }
        return false;
    }

}

$db = new db;
$query = $db->query("SELECT * FROM `user_info` WHERE user_id = 'change'");
foreach($query->result() as $row){
    echo $row->user_id.'<br/>';

?>