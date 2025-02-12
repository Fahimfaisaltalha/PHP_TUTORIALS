<?php

//Verify the user login info
session_start();
$_SESSION['username']="Talha";
$_SESSION['favCat']="Car";
echo "We have saved your Session";