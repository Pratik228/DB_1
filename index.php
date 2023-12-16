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
$stmt = $conn->prepare("INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssids", $productCode, $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $MSRP);


// Execute the statement and check for errors
if ($stmt->execute()) {
   echo "New product added successfully";
} else {
   echo "Error: " . $stmt->error;
}


// Close the statement and the connection
$stmt->close();
$conn->close();
?>



