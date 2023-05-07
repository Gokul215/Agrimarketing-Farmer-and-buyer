<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>
	<h1>Add Product</h1>
	<form method="POST" action="insertProduct.php">
		<label for="product_name">Product Name:</label>
		<input type="text" name="product_name" id="product_name" required>
		<br><br>
		<label for="description">Description:</label>
		<textarea name="description" id="description" required></textarea>
		<br><br>
		<label for="price">Price:</label>
		<input type="number" name="price" id="price" required>
		<br><br>
		<label for="quantity">Quantity:</label>
		<input type="number" name="quantity" id="quantity" required>
		<br><br>
		<label for="farmer_id">Farmer ID:</label>
		<input type="number" name="farmer_id" id="farmer_id" required>
		<br><br>
		<input type="submit" value="Add Product">
	</form>
</body>
</html>


<?php
// Define the database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agrocraft";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_name = $_POST["product_name"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];
  $farmer_id = $_POST["farmer_id"];

  // Insert the product information into the database
  $sql = "INSERT INTO products1 (product_name, description, price, quantity, farmer_id)
  VALUES ('$product_name', '$description', '$price', '$quantity', '$farmer_id')";

  if (mysqli_query($conn, $sql)) {
    echo "Product added successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>
