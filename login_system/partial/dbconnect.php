<?php
$server="localhost";
$username="root";
$password="";
$database="users";
$con= mysqli_connect($server,$username,$password,$database);
if(!$con){
        die("Error".mysqli_connect_errno());
    
}