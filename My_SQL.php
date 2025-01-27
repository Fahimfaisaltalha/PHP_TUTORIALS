<?php
echo "Wellcome to the stage where we are ready to get connected to a database <br>";

// Ways to connect to a MySQL Database
// 1. MySQLi extension
// 2.PDO

// Connecting to the Database
$servername="localhost";
$username ="root";
$password ="";

// Create a Connection
$conn= mysqli_connect($servername,$username,$password);

echo "Connection was successful";

?>