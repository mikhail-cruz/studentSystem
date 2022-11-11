<?php

include_once('connections/connection.php');
$connection = connection();

if(isset($_POST['delete'])){

  $id = $_POST['ID'];
  $sql = "DELETE FROM student_list WHERE id = '$id'";
  $connection->query($sql) or die ($connection->error);

  echo '<script>alert("No user found!")</script>';
  echo header('Location: index.php');

}



?>