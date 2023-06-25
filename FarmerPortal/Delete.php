<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];

if (isset($_GET['id'])) {
    // echo"5";
    $id=$_GET['id'];
    // echo $id;
    $con = mysqli_connect('localhost', 'root', '', 'agrocraft');

    // Check if connection was successful
    if (!$con) {
        echo "con failed";
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql= "DELETE from products where product_id =$id";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Product has been deleted')</script>";
        echo "<script>window.open('farmerHomepage.php','_self')</script>";
        // echo "Data inserted successfully";
    } else {
        echo "Error inserting data: " . mysqli_error($con);

    }
}


?>