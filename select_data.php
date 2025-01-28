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

$sql= "SELECT * FROM `trip`";
$result=mysqli_query($conn, $sql);

//Find the number of Record
$num= mysqli_num_rows($result);
echo $num;
echo "records Found in the Database<br>";

//Display the rows returned by the sql query
if($num>0){
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    // $row=mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";

    //We can fetch in a better way using the while loop
    while($row=mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo $row['sno']. " .Hello" . $row ['name'] ."Welcome to" . $row['dest'];
        echo "<br>";

    }



}
?>