<?php

function connection(){

  $host = 'localhost';
  $username = 'root';
  $password = '12345';
  $database = 'student_system';

  $connection = new mysqli($host, $username, $password, $database);

  if($connection->connect_error){
    echo $connection->connect_error;
  }else{
    return $connection;
  }


}

?>