<?php
// Replace with your connection details
$dbHost = 'elvis.rowan.edu';
$dbUsername = 'yourstudentusername'; // Replace with your username
$dbPassword = 'yourpassword'; // Replace with your password
$dbName = 'yourdatabase'; // Replace with your database name


// Create a connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);


// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}


// Retrieve search string from POST request
$searchString = $_POST['searchString'];


// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("SELECT productCode, productName, productDescription FROM products WHERE productCode LIKE ? OR productName LIKE ? OR productDescription LIKE ?");
$searchTerm = '%' . $searchString . '%';
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);


// Execute the statement and fetch the results
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
   // Display the results in a table
   echo "<table border='1'>";
   echo "<tr><th>Product Code</th><th>Product Name</th><th>Product Description</th></tr>";
   while($row = $result->fetch_assoc()) {
       echo "<tr>";
       echo "<td>" . $row["productCode"] . "</td>";
       echo "<td>" . $row["productName"] . "</td>";
       echo "<td>" . $row["productDescription"] . "</td>";
       echo "</tr>";
   }
   echo "</table>";
} else {
   echo "No results found";
}


// Close the statement and the connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Search Products</title>
</head>
<body>
   <h1>Search Products</h1>
   <form action="search.php" method="post">
       <label>Search: <input type="text" name="searchString" required></label>
       <input type="submit" value="Search">
   </form>
</body>
</html>

