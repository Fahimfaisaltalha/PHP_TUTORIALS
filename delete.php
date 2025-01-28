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
$sql= "DELETE FROM `trip` WHERE `trip`.`dest` = 'Russia' LIMIT 3";
$result=mysqli_query($conn, $sql);
$aff=mysqli_affected_rows($conn);
echo "<br> Number of affected rows: $aff <br>";

if($result){
    echo "Deleted successfully ";
}
else{
    echo "Not Delete successfully due to this error ----> $err ";
}


?>