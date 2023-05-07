<?php 

$con = new mysqli('localhost','root','','agrocraft');
if($con->connect_error){
        echo "$con->connect_error";
        die("Connection Failed : ". $con->connect_error);
}

        // $con = mysqli_connect("localhost","root","","agrocraft");
      
        // if (mysqli_connect_errno()) {
        //         echo "Failed to connect to MySql " . mysqli_connect_error();
        // }
