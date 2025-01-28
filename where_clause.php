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
$sql= "SELECT * FROM `trip` WHERE `dest`='india'";
$result=mysqli_query($conn, $sql);

//Find the number of Record
$num= mysqli_num_rows($result);
echo $num;
echo " records Found in the Database<br>";
$no=1;
if($num>0){
    //We can fetch in a better way using the while loop
    while($row=mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo $no . ". Hello" . $row ['name'] ."Welcome to" . $row['dest'];
        echo "<br>";
        $no=$no+1;

    }
}

//Usage of Where clause to update data
$sql="UPDATE `trip` SET `name` = 'Mujahidul' WHERE `trip`.`sno` = 6";
$result=mysqli_query($conn, $sql);
if($result){
    echo "Update is successful";
}
else{
    echo "Update is fail";
}
?>