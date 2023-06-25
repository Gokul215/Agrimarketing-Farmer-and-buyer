<?php
include("../Includes/db.php");
session_start();
$sessphonenumber = $_SESSION['phonenumber'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../portal_files/bootstrap.min.css">


    <title>Farmer - Insert Product</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <main class="my-form">
            <div class="cotainer">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <?php
                            // if (isset($_POST['insert_pro'])) {
                            if (isset($_SESSION['phonenumber'])) {

                                if (isset($_GET['id'])) {

                                    $id = $_GET['id'];
                                    // echo $id;
                                    $con = mysqli_connect('localhost', 'root', '', 'agrocraft');

                                    // Check if connection was successful
                                    if (!$con) {
                                        echo "con failed";
                                        die("Connection failed: " . mysqli_connect_error());
                                    }




                                    if (isset($_POST['insert_pro'])) {
                                        // echo "5";
                                        // if (isset($_SESSION['phonenumber'])) {
                                        //         echo "4";
                            
                                        //  echo "3";
                                        // if (isset($_GET['id'])) {
                            
                                        //     $id = $_GET['id'];
                                        if (isset($_GET['id'])) {

                                            $id = $_GET['id'];

                                            echo $id;
                                            //         $con = mysqli_connect('localhost','root','','agrocraft');
                            
                                            //         // Check if connection was successful
                                            //         if (!$con) {
                                            //             echo "con failed";
                                            //             die("Connection failed: " . mysqli_connect_error());
                                            //         }
                            
                                            // $getting_prod = "select * from products where product_id = $id";
                                            // $run = mysqli_query($con, $getting_prod);
                            

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
                                            $product_image_tmp = $_FILES['product_image']['tmp_name']; // for server
                            

                                            move_uploaded_file($product_image_tmp, "../Admin/product_images/$product_image");

                                            $phone = $_POST['phonenumber'];




                                            $sql = "UPDATE products SET product_title='$product_title',  product_delivery=' $product_delivery',product_cat='$product_cat',  product_keywords=' $product_keywords', product_type=' $product_type' ,product_stock='$product_stock', product_price='$product_price', product_image ='$product_image ',product_desc='$product_desc', product_expiry='$product_expiry' WHERE product_id=$id";

                                            if (mysqli_query($con, $sql)) {
                                                echo "<script>alert('Product has been updated')</script>";
                                                echo "<script>window.open('farmerHomepage.php','_self')</script>";
                                                // echo "Data inserted successfully";
                                            } else {
                                                echo "Error inserting data: " . mysqli_error($con);

                                            }
                                        }
                                    }

                                    // $insert_product= "INSERT INTO `products` ( `farmer_fk`, `product_title`, `product_cat`, `product_type`, `product_expiry`, `product_image`, `product_stock`, `product_price`, `product_desc`, `product_keywords`, `product_delivery`) 
                                    // values ('$id' ,'$product_title','$product_cat','$product_type','$product_expiry','$product_image','$product_stock',
                                    //                                     '$product_price','$product_desc',
                                    //                                        '$product_keywords','$product_delivery')";
                            
                                    //         // $insert_query = mysqli_query($con, $insert_product);
                                    //         // // echo $insert_product;
                                    //         // if ($insert_query) {
                                    //         //     echo "<script>alert('Product has been added')</script>";
                                    //         //     // echo "<script>window.open('farmerHomepage.php','_self')</script>";
                                    //         // } else {
                                    //         //     echo "<script>alert('Error Uploading Data Please Check your Connections ')</script>";
                                    //         // }
                            
                                    //         if (mysqli_query($con, $insert_product)) {
                                    //             echo "<script>alert('Product has been added')</script>";
                                    //             echo "<script>window.open('farmerHomepage.php','_self')</script>";
                                    //             // echo "Data inserted successfully";
                                    //         } else {
                                    //             echo "Error inserting data: " . mysqli_error($con);
                                    //         }
                            
                                    //         // Close database connection
                                    $getting_prod = "select * from products where product_id = $id";
                                    $run = mysqli_query($con, $getting_prod);

                                    while ($details = mysqli_fetch_array($run)) {
                                        $product_title = $details['product_title'];
                                        $product_cat = $details['product_cat'];
                                        $product_type = $details['product_type'];
                                        $product_stock = $details['product_stock'];
                                        $product_price = $details['product_price'];
                                        $product_image = $details['product_image'];

                                        move_uploaded_file($product_image_tmp, "../Admin/product_images/$product_image");
                                        $product_expiry = $details['product_expiry'];
                                        $product_desc = $details['product_desc'];
                                        $product_keywords = $details['product_keywords'];
                                        $product_delivery = $details['product_delivery'];


                                    }
                                }

                            }








                            ?>

                            <div class="card-header">
                                <h4 class="text-center font-weight-bold">Insert Your New Product <i
                                        class="fas fa-leaf"></i></h4>
                            </div>
                            <div class="card-body">

                                <form name="my-form" action="editInsert.php" method="post"
                                    enctype="multipart/form-data">

                                    <input type="hidden" name="id" value="<?php echo $id; ?>">


                                    <div class="form-group row">
                                        <label for="full_name"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            Title:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="full_name" class="form-control" name="product_title"
                                                placeholder="<?php echo $product_title; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email_address"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            Stock:(In kg)</label>
                                        <div class="col-md-6">
                                            <input type="text" id="full_name" class="form-control" name="product_stock"
                                                placeholder="<?php echo $product_stock; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="user_name"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            Categories:</label>
                                        <div class="col-md-6">
                                            <select name="product_cat" required>
                                                <option>Select a Category</option>
                                                <?php
                                                $get_cats = "select * from categories";
                                                $run_cats = mysqli_query($con, $get_cats);
                                                while ($row_cats = mysqli_fetch_array($run_cats)) {
                                                    $cat_id = $row_cats['cat_id'];
                                                    $cat_title = $row_cats['cat_title'];
                                                    echo "<option value='$cat_id'>$cat_title</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone_number"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            type :</label>
                                        <div class="col-md-6">
                                            <input type="text" id="phone_number" class="form-control"
                                                name="product_type" placeholder="<?php echo $product_type; ?>" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="present_address"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            Expiry :</label>
                                        <div class="col-md-6">
                                            <input id="present_address" class="form-control" type="date"
                                                name="product_expiry" placeholder="<?php echo $product_expiry; ?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="permanent_address"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            Image :</label>
                                        <div class="col-md-6">
                                            <input id="permanent_address" type="file" name="product_image"
                                                placeholder="<?php echo $product_image; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nid_number"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            MRP : (Per kg)</label>
                                        <div class="col-md-6">
                                            <input type="text" id="nid_number" class="form-control" name="product_price"
                                                placeholder="<?php echo $product_price; ?>" required>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group row">
                                        <label for="nid_number1" class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product Base Price:(Per kg)</label>
                                        <div class="col-md-6">
                                            <input type="text" id="nid_number1" class="form-control" name="product_baseprice" placeholder="Enter Product base price" required>
                                        </div>
                                    </div> -->

                                    <div class="form-group row">
                                        <label for="nid_number2"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">
                                            Product Description:</label>
                                        <div class="col-md-6">
                                            <textarea name="product_desc" id="nid_number2" class="form-control"
                                                name="product_desc" rows="3" placeholder="<?php echo $product_desc; ?>"
                                                required></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nid_number3"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Product
                                            Keywords:</label>
                                        <div class="col-md-6">
                                            <input type="text" id="nid_number3" class="form-control"
                                                name="product_keywords" placeholder="<?php echo $product_keywords; ?>"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nid_number4"
                                            class="col-md-4 col-form-label text-md-right text-center font-weight-bolder">Delivery
                                            :</label>
                                        <div class="col-md-6">
                                            <input type="radio" id="nid_number4" name="product_delivery"
                                                value="yes" />Yes
                                            <input type="radio" id="nid_number4" name="product_delivery" value="no" />No
                                        </div>
                                    </div>
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" name="insert_pro">
                                            INSERT
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>

    <body>

</html>