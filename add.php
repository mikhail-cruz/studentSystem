<?php

include_once('connections/connection.php');

$connection = connection();

if(isset($_POST['submit'])){

  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $birthday = $_POST['birthday'];

  $sql = "INSERT INTO student_list
            (`first_name`, `last_name`, `email`, `gender`, `birth_day`)
          VALUES
            ('$firstName', '$lastName', '$email', '$gender', '$birthday')";

  $connection->query($sql) or die ($connection->error);

  echo header("Location: index.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Management System</title>

  <!--  Bootstrap CDN  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!--  Custom CSS -->
  <link rel="stylesheet" href="./css/custom.css">
</head>
<body>
  <div class="container font-monospace">
    <h1 class="m-5 text-center">Add New</h1>
    <div class="m-5 m-auto">
      <form action="" method="POST">
        <div class="mb-3">
          <label for="firstName" class="form-label">First Name</label>
          <input type="text" name="firstName" class="form-control" id="firstName">
        </div>
        <div class="mb-3">
          <label for=lastName" class="form-label">Last Name</label>
          <input type="text" name="lastName" class="form-control" id="lastName">
        </div>
        <div class="mb-3">
          <label for=email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Gender: </label>
          <select name="gender" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
        <div class="mb-3">
          <label for=birthday" class="form-label">Birthday</label>
          <input type="text" name="birthday" class="form-control" id="birthday">
        </div>
        <button type="submit" name="submit" class="btn btn-primary w-100">Submit Form</button>
      </form>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>