<?php
// Ways to connect to a MySQL Database
// 1. MySQLi extension
// 2. PDO

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_talha"; // Your database name

// Create a Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connection was successful<br>";

// Create a Table
$sql = "CREATE TABLE `trip` (
    `sno` INT(6) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(12) NOT NULL,
    `dest` VARCHAR(6) NOT NULL,
    PRIMARY KEY (`sno`)
)";

// Execute the query
if (mysqli_query($conn, $sql)) {
    echo "Table 'trip' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
