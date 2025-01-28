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


$sql = "INSERT INTO `trip` (`name`, `dest`) VALUES ('Soroar', 'England')";
$result=mysqli_query($conn, $sql);
if ($result) {
    echo "Table Record was inserted successfully.";
} else {
    echo "The Record was not inserted Successfully: " . mysqli_error($conn);
}
?>