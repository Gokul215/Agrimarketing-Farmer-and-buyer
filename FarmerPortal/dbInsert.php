<?php
// include("../Includes/db.php");

if (isset($_POST['insert_pro'])) {
//     echo "t";
// }
// else{
//     echo "f";
// }

     // when button is clicked

    // // getting the text data from fields
    // $product_title = $_POST['product_title'];
    // $product_cat = $_POST['product_cat'];
    // $product_type = $_POST['product_type'];
    // $product_stock = $_POST['product_stock'];
    // $product_price = $_POST['product_price'];
    // $product_expiry = $_POST['product_expiry'];
    // $product_desc = $_POST['product_desc'];
    // $product_keywords = $_POST['product_keywords'];
    // $product_delivery = $_POST['product_delivery'];

   
    // // getting image
    // $product_image = $_FILES['product_image']['name'];
    // $product_image_tmp = $_FILES['product_image']['tmp_name'];  // for server

    
    // move_uploaded_file($product_image_tmp, "../Admin/product_images/$product_image");

    //     $phone = $_POST['phonenumber'];
    //     $getting_id = "select * from farmerregistration where farmer_phone =  $phone";
    //     $run = mysqli_query($con, $getting_id);
    //     $row = mysqli_fetch_array($run);
    //     $id = $row['farmer_id'];

    // $con = new mysqli('localhost','root','','agrocraft');
    // if($con->connect_error){
    //      echo "$con->connect_error";
    //      die("Connection Failed : ". $con->connect_error);
    //  }
    $con = mysqli_connect('localhost','root','','agrocraft');

// Check if connection was successful
if (!$con) {
    echo "con failed";
    die("Connection failed: " . mysqli_connect_error());
}


    // $id =3;
    // $product_title="potato";
    //  $product_cat=2;
    //  $product_type="potato";
    //  $product_expiry="01-01-2020";
    //  $product_image_tmp="potato1.jpeg";
    //  $product_stock=5;

    // $product_price=20;
    // $product_desc="aaa";
    // $product_keywords="potato";
    // $product_delivery="yes";

//         $con = new mysqli('localhost','root','','agrocraft');
//    if($con->connect_error){
//         echo "$con->connect_error";
//         die("Connection Failed : ". $con->connect_error);


//     }

 $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_type = $_POST['product_type'];
    $product_stock = $_POST['product_stock'];
    $product_price = $_POST['product_price'];
    $product_expiry = $_POST['product_expiry'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_delivery = $_POST['product_delivery'];

   
    // getting image
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];  // for server

    
    move_uploaded_file($product_image_tmp, "../Admin/product_images/$product_image");

        $phone = $_POST['phonenumber'];
        $getting_id = "select * from farmerregistration where farmer_phone =  $phone";
        $run = mysqli_query($con, $getting_id);
        $row = mysqli_fetch_array($run);
        $id = $row['farmer_id'];

    
        // $insert_product = "INSERT INTO products (farmer_fk,product_title, product_cat, 
        //                         product_type,product_expiry,product_image, product_stock, product_price,
        //                         product_desc,  product_keywords, product_delivery) 
        //                         values ('$id ,'$product_title','$product_cat','$product_type','$product_expiry','$product_image_tmp','$product_stock',
        //                                 '$product_price','$product_desc',
        //                                 '$product_keywords','$product_delivery')";
        $insert_product= "INSERT INTO `products` ( `farmer_fk`, `product_title`, `product_cat`, `product_type`, `product_expiry`, `product_image`, `product_stock`, `product_price`, `product_desc`, `product_keywords`, `product_delivery`) 
values ('$id' ,'$product_title','$product_cat','$product_type','$product_expiry','$product_image','$product_stock',
                                    '$product_price','$product_desc',
                                       '$product_keywords','$product_delivery')";

        // $insert_query = mysqli_query($con, $insert_product);
        // // echo $insert_product;
        // if ($insert_query) {
        //     echo "<script>alert('Product has been added')</script>";
        //     // echo "<script>window.open('farmerHomepage.php','_self')</script>";
        // } else {
        //     echo "<script>alert('Error Uploading Data Please Check your Connections ')</script>";
        // }

        if (mysqli_query($con, $insert_product)) {
            echo "<script>alert('Product has been added')</script>";
            echo "<script>window.open('farmerHomepage.php','_self')</script>";
            // echo "Data inserted successfully";
        } else {
            echo "Error inserting data: " . mysqli_error($con);
        }
        
        // Close database connection
        
}
    


?>