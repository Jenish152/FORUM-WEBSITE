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
    <?php 
    $id=$_GET['threadid'];
$sql="SELECT * FROM `thread` WHERE thread_id='$id'";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

    ?>
    <?php
     $method=$_SERVER['REQUEST_METHOD'];
     $showalrt=false;
     if ($method=='POST') {
         $com=$_POST['comment'];
         $com=str_replace('<',$com,'&lt;');
         $com=str_replace('>',$com,'&gt;');
         $user_id=$_SESSION['sno'];
        $sql="INSERT INTO `commentes` ( `comment`, `threadid`, `commenttime`, `commentby`) VALUES ('$com', '$id', current_timestamp(), '$user_id')
        ";
        $resultofinsert=mysqli_query($connect,$sql); 
        if ($resultofinsert) { 
            $showalrt=true; 
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>SUCCESS!</strong> YOUR QUESTION SUCCESSFULLY INSERT.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>
    <div class="container my-4 py-3" style="background-color: rgb(190, 182, 182);">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $row['title']; ?></h1>
            <p class="lead"><?php echo $row['desc']; ?></p>
            <hr class="my-4">
            <p class="lead">This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                questions. Remain respectful of other members at all times.</p>
        </div>
    </div>
    <div class="container">
        <h1>POST COMMENT</h1>
        <?php
        if (isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true) {
            # code...
            echo'<form action="discussion.php?threadid='.$id.'" method="post">
            <div class="mb-3">

                <textarea class="form-control" placeholder="Leave a comment here" id="inputcom" name="comment"
                    style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-success my-4">POST COMMENT</button>
        </form>';
          } else {
            # code...
            echo'<p class="lead">Please First Login On This Website</p>';
          }
        
        ?>
    </div>
    <div class="container">
        
        <h1>COMMENTES </h1>
        <?php
$sql="SELECT * FROM `commentes` WHERE threadid='$id'";
$result=mysqli_query($connect,$sql);
while ($com=mysqli_fetch_assoc($result)) {
    $userid=$com['commentby'];
    $sql2="SELECT `user_email` FROM `user` WHERE user_id='$userid'";
    $result2=mysqli_query($connect,$sql2);
    $row2=mysqli_fetch_assoc($result2);
  echo '<div class="media d-flex my-4">
  <img src="" width="54px" height="54px" alt="loaad">
  <div class="media-body">
      <p class="my-0">post by <b>'.$row2['user_email'].'</b></p>
      '.$com['comment'].'
  </div>
  
</div>';
}
?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- INSERT INTO `categories` (`idno`, `name`, `description`, `date`) VALUES (NULL, 'c++', 'c++ is object oriented\r\n', current_timestamp()); -->
<!-- SELECT * FROM `categories` -->