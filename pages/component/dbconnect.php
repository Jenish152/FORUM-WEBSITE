<?php
$servername="localhost";
$username="root";
$password="";
$database="iforum";
$connect= mysqli_connect($servername,$username,$password,$database);
if (!$connect) {
    # code...
    die("sorry not connect : ".mysqli_connect_error());
}
else{
    // echo"database successfully connect";
}
?>