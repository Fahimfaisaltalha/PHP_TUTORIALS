<?php
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
//Variable to be inserted to table
$name="Sohag";
$destination="Russia";
$sql = "INSERT INTO `trip` (`name`, `dest`) VALUES ('$name', '$destination')";
$result=mysqli_query($conn, $sql);
if ($result) {
    echo "Table Record was inserted successfully.";
} else {
    echo "The Record was not inserted Successfully: " . mysqli_error($conn);
}
?>