<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    session_start();
  echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">about</a>
        </li>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      include 'component/dbconnect.php';
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($connect, $sql); 
      while($row = mysqli_fetch_assoc($result)){
        echo '<a class="dropdown-item" href="thread.php?catid='. $row['idno']. '">' . $row['name']. '</a>'; 
      }        
      echo '</div>
    </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php" tabindex="-1">contact</a>
        </li>
      </ul>';
     if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) {
       # code...
       echo'<form class="d-flex" style="align-items: center;" action="search.php" method="get">
       <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
       <a href="/forumwebsite/pages/component/handlelogout.php" class="btn btn-outline-success mx-1">LOGOUT</a>
       <p class="text-light my-0 mx-2">'.$_SESSION['useremail'].'</p>
     </form>';
     } else {
       # code...
       echo'<form class="d-flex" action="search.php" method="get">
       <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-success" type="submit">Search</button>
       <button type="button" class="btn btn-outline-success mx-1" type="submit" data-bs-toggle="modal" data-bs-target="#signupmodal">SIGNUP</button>
       <button type="button" class="btn btn-outline-success" type="submit" data-bs-toggle="modal" data-bs-target="#loginmodal">LOGIN</button>
     </form>';
     }
     
      
    echo'</div>
  </div>
</nav>'; 
?>
<?php
include 'signupmodal.php';
include 'loginmodal.php';
?>
<?php
if (isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=='true') {
  # code...
  echo'<div class="alert alert-success alert-dismissible fade show my-0"  role="alert">
  <strong>Success!</strong>registration successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>