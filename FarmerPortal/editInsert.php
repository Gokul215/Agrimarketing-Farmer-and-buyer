<?php
                            // if (isset($_POST['insert_pro'])) {
                                include("../Includes/db.php");
                                if (isset($_POST['insert_pro'])) {
                                    // echo "5";
                            // if (isset($_SESSION['phonenumber'])) {
                            //         echo "4";
                           
                                    //  echo "3";
                                    
                                
                            //         echo $id;
                            //         $con = mysqli_connect('localhost','root','','agrocraft');

                            //         // Check if connection was successful
                            //         if (!$con) {
                            //             echo "con failed";
                            //             die("Connection failed: " . mysqli_connect_error());
                            //         }
                            $id=$_POST['id'];

                                    $getting_prod = "select * from products where product_id = $id";
                                    $run = mysqli_query($con, $getting_prod);

                              
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


                                        

                                            $sql = "UPDATE products SET product_title='$product_title',  product_delivery=' $product_delivery',product_cat='$product_cat',  product_keywords=' $product_keywords', product_type=' $product_type' ,product_stock='$product_stock', product_price='$product_price', product_image ='$product_image ',product_desc='$product_desc', product_expiry='$product_expiry' WHERE product_id=$id";

                                            if (mysqli_query($con, $sql)) {
                                                echo "<script>alert('Product has been updated')</script>";
                                                echo "<script>window.open('farmerHomepage.php','_self')</script>";
                                                // echo "Data inserted successfully";
                                            } else {
                                                echo "Error inserting data: " . mysqli_error($con);
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
                                                
                                        }
                                        
                                    
                                    
                                
                        
                            



                         


                            ?>