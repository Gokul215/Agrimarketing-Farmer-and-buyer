<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
echo"4";
if($sessphonenumber){
    echo"true";
}
else{
    echo"f";
}
?>