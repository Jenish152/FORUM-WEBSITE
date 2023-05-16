<?php
include 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $sql="SELECT * FROM `user` WHERE user_email='$email'";
    $result=mysqli_query($connect,$sql);
    $numrow=mysqli_num_rows($result);

    if ($numrow==1) {
        $row=mysqli_fetch_assoc($result);
        if ($pass==$row['user_password']) {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$email;
            $_SESSION['sno']=$row['user_id'];
           
            header("Location: /forumwebsite/pages/index.php");
        }
    }
    // header("Location: /forumwebsite/pages/index.php"); 
}
?>
