<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Wellcome". $_SESSION['username'];
    echo "</br>";
    echo "Your favorite category is ".$_SESSION['favCat'];

}
else{
    echo"Please Login";
}