<?php

if(!isset($_SESSION)){
  session_start();
}

include_once('connections/connection.php');

$connection = connection();

$search = $_GET['search'];

$sql = "SELECT * FROM student_list 
          WHERE first_name LIKE '%$search%' || last_name LIKE '%$search%'
          ORDER BY id
          DESC";

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
    <p class="text-center mt-3"><?php if(isset($_SESSION['UserLogin'])){
      echo "Welcome ". $_SESSION['UserLogin'] . "!";
    }else{
      echo 'Welcome Guest!';
    } ?>
    </p>
    <h1 class="text-center mt-3">Student Management System</h1>

    <div class="d-flex justify-content-between">
      <div>
        <?php if((isset($_SESSION['Access']) && $_SESSION['Access'] == 'administrator') ||(isset($_SESSION['Access']) && $_SESSION['Access'] == 'user')) { ?>
        <a href="add.php" class="mb-3 text-decoration-none btn btn-sm btn-primary">Add New Student</a>
        <?php } ?>
      </div>

      <div class="">
        <form action="result.php" class="d-flex" role="search" method="GET">
          <input class="form-control me-2 w-100" type="search" name="search" id="search">
          <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
      </div>

      <div>
        <?php if(isset($_SESSION['UserLogin'])){ ?>
          <a href="logout.php" class="mb-3 text-decoration-none btn btn-sm btn-primary">Logout</a>
        <?php } else{ ?>
          <a href="login.php" class="mb-3 text-decoration-none btn btn-sm btn-primary">Login</a>
        <?php } ?>
      </div>

    </div>


    <table class="table table-striped border table-hover table-bordered">
      <thead>
        <tr>
          <th></th>
          <th>First Name</th>
          <th>Last Name</th>
        </tr>
      </thead>
        <tbody>
          <?php do{ ?>
        <tr>
          <td class="w-25 text-center"><a class="text-decoration-none" href="details.php?ID=<?php echo $row['id']; ?>">View Details</a></td>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
        </tr>
        <?php }while($row = $students->fetch_assoc()); ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</html>