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


// Retrieve unique identifier from POST request
$uniqueID = $_POST['uniqueID'];


// Prepare SQL statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM yourChosenTable WHERE uniqueColumnName = ?");
$stmt->bind_param("s", $uniqueID); // 's' specifies the variable type => 'string'


// Execute the statement and check for errors
if ($stmt->execute()) {
   echo "Record deleted successfully";
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
   <title>Delete Record</title>
</head>
<body>
   <h1>Delete Record from Database</h1>
   <form action="delete.php" method="post">
       <label>Unique Identifier: <input type="text" name="uniqueID" required></label><br>
       <input type="submit" value="Delete Record">
   </form>
</body>
</html>

