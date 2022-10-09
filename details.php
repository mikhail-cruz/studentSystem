<?php

if(!isset($_SESSION)){
  session_start();
}

if(isset($_SESSION['Access']) && $_SESSION['Access'] == 'administrator'){
  echo "Welcome ". $_SESSION['UserLogin'];
}else{
  echo header('Location: index.php');
}

include_once('connections/connection.php');

$connection = connection();

$id = $_GET['ID'];

$sql = "SELECT * FROM student_list WHERE id = '$id'";
$students = $connection->query($sql) or die ($connection->error);
$row = $students->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Management System</title>

  <!-- * Bootstrap CDN  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- * Custom CSS -->
  <link rel="stylesheet" href="./css/custom.css">
</head>
<body>
  <div class="container font-monospace">
    <h1 class="text-center mt-3 mb-3">Student Details </h1>

    <a href="index.php" class="btn btn-sm btn-primary text-decoration-none"><i class="fa-solid fa-left-long"></i></a>

    <div>
      <div class="card m-auto shadow" style="width: 20rem;">
        <!-- <img src="..." class="card-img-top" alt="..."> -->
        <div class="card-body">
          <p class="fw-bold">Student ID: <span class="fw-light"><?php echo $row['id']?></span> </p>
          <p class="fw-bold">First Name: <span class="fw-light"><?php echo $row['first_name']?> </span></p>
          <p class="fw-bold">Last Name: <span class="fw-light"><?php echo $row['last_name']?> </span></p>
          <p class="fw-bold">Email: <span class="fw-light"><?php echo $row['email']?> </span></p>
          <p class="fw-bold">Gender: <span class="fw-light"><?php echo $row['gender']?> </span></p>
          <p class="fw-bold">Date of Birth: <span class="fw-light"><?php echo $row['birth_day']?></span> </p>
        </div>
        <form action="delete.php" method="POST" class="mt-0 mb-3 m-auto">
          <a href="edit.php?ID=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary text-decoration-none">Edit</a>
          <button type="submit" name="delete" class="btn btn-sm btn-danger text-decoration-none">Delete</button>
          <input class="form control" type="hidden" name="ID" value="<?php echo $row['id']; ?>">
        </form>
      </div>
    </div>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>