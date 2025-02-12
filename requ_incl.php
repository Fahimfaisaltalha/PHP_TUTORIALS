<?php
include '_dbconnect.php';
// require '_dbconnect.php';
$sql= "SELECT * FROM `notes`";
$result=mysqli_query($conn, $sql);

//Find the number of Record
$num= mysqli_num_rows($result);
echo $num;
echo "records Found in the Database<br>";