<?php
$con=mysqli_connect('localhost','root','','login_db');
if(!$con){
    die(mysqli_error("error"+$con));
}

?>