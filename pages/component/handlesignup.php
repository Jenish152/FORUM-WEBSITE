<?php
$showerror="false";
include 'dbconnect.php';
 
    # code...
    $user_email=$_POST['email'];
    $user_password=$_POST['pass'];
    $user_confirmpassword=$_POST['cpass'];
    //checkexit email id
    $sql="SELECT * FROM `user` WHERE user_email='$user_email'"; 
    $result=mysqli_query($connect,$sql);
    $row=mysqli_num_rows($result);
    if ($row>0) {
       $showerror="email already exist";
        } 
        else {
        # code...
        if ($user_password==$user_confirmpassword) {
            # code...
            $hash=password_hash($user_password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` ( `user_email`, `user_password`, `timestamp`) VALUES ( '$user_email', '$user_password', current_timestamp());
            ";
    $result=mysqli_query($connect,$sql);
    if ($result) {
        $showalert=true;
        header("Location: /forumwebsite/pages/index.php?signupsuccess=true");
        echo'exit';
        exit();
    }
        } else {
            $showerror="password do not match";
        }
        
    }
    
}
header("Location: /forumwebsite/pages/index.php?signupsuccess=false&error=$showerror");
?>