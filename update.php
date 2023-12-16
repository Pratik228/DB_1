<?php
// Replace with your connection details
$dbHost = 'elvis.rowan.edu';
$dbUsername = 'nallau92';
$dbPassword = '1PurpLe3truCk!'; // Corrected the syntax error in the password
$dbName = 'nallau92';


// PHP comment header with student name and date
// STUDENT NAME: Upendra Nalla
// DATE: 12/16/2023


// Create a connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


// Retrieve data from POST request
$productCode = $_POST['productCode'];
$productName = $_POST['productName'];
$productLine = $_POST['productLine'];
$productScale = $_POST['productScale'];
$productVendor = $_POST['productVendor'];
$productDescription = $_POST['productDescription'];
$quantityInStock = $_POST['quantityInStock'];
$buyPrice = $_POST['buyPrice'];
$MSRP = $_POST['MSRP'];


// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("UPDATE products SET productName = ?, productLine = ?, productScale = ?, productVendor = ?, productDescription = ?, quantityInStock = ?, buyPrice = ?, MSRP = ? WHERE productCode = ?");
$stmt->bind_param("sssssiiss", $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP, $productCode);


// Execute the statement and check for errors
if ($stmt->execute()) {
   echo "Product updated successfully";
} else {
   echo "Error: " . $stmt->error;
}


// Close the statement and the connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Update Product</title>
</head>
<body>
   <h1>Update Product Details</h1>
   <form action="update.php" method="post">
       <label>Product Code: <input type="text" name="productCode" required></label><br>
       <label>Product Name: <input type="text" name="productName" required></label><br>
       <label>Product Line: <input type="text" name="productLine" required></label><br>
       <label>Product Scale: <input type="text" name="productScale" required></label><br>
       <label>Product Vendor: <input type="text" name="productVendor" required></label><br>
       <label>Product Description: <textarea name="productDescription" required></textarea></label><br>
       <label>Quantity in Stock: <input type="number" name="quantityInStock" required></label><br>
       <label>Buy Price: <input type="text" name="buyPrice" required></label><br>
       <label>MSRP: <input type="text" name="MSRP" required></label><br>
       <input type="submit" value="Update Product">
   </form>
</body>
</html>

