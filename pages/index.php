<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>JFORUM</title>
</head>

<body>
    <?php
    include 'component/dbconnect.php';
    ?>
    <?php
    include 'component/Navbar.php';
    ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="height:70vh; width:50vw;"
                    src="https://f.hubspotusercontent00.net/hubfs/53/Google%20Drive%20Integration/How%20to%20Start%20Coding%20The%20Ultimate%20Guide%20for%20Beginner%20Programmers.jpeg"
                    class="d-block w-100" alt="...">
            </div>
            <div style="height:70vh;" class="carousel-item">
                <img src="https://f.hubspotusercontent00.net/hubfs/53/Google%20Drive%20Integration/How%20to%20Start%20Coding%20The%20Ultimate%20Guide%20for%20Beginner%20Programmers.jpeg"
                    class="d-block w-100" alt="...">
            </div>
            <div style="height:70vh;" class="carousel-item">
                <img src="https://f.hubspotusercontent00.net/hubfs/53/Google%20Drive%20Integration/How%20to%20Start%20Coding%20The%20Ultimate%20Guide%20for%20Beginner%20Programmers.jpeg"
                    class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end of slider -->


    <div class="container">
        <h2 class="my-3">iDiscuss-catogeries</h2>
        <div class="row">
            <?php
$sql="SELECT * FROM `categories`";
$result=mysqli_query($connect,$sql);
while ($cat=mysqli_fetch_assoc($result)) {
  echo '<div class="col-md-4 my-4">
  <div class="card" style="width: 18rem;">
     <img src="..." class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title"><a href="thread.php?catid='.$cat['idno'].'">'.$cat['name'].'</a></h5>
       <p class="card-text" >'.substr($cat['description'],0,100).'</p>
       <a href="thread.php?catid='.$cat['idno'].' class="btn btn-primary">VIEW THREAD</a>  
     </div>
   </div>
</div>';
}
?>

        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- INSERT INTO `categories` (`idno`, `name`, `description`, `date`) VALUES (NULL, 'c++', 'c++ is object oriented\r\n', current_timestamp()); -->
<!-- SELECT * FROM `categories` -->