<?php

class Database{

static $connection;

public static function setUpConnection(){
if(!isset(Database::$connection)){
    Database::$connection = new mysqli("localhost", "root", "SAm@k1d3w584", "softlearner", "3306");
}
}

public static function iud($q){

    Database::setUpConnection();
    Database::$connection->query($q);
}

public static function search($q){

    Database::setUpConnection();
    $result = Database::$connection->query($q);
    return $result; 
}

}



?>