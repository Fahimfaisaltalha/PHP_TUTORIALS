<?php  
$showAlert=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include 'partial/dbconnect.php';
    $username=$_POST["username"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    $exists=false;
    if(($password==$cpassword) && $exists==false){
        $sql="INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$password', current_timestamp())";
        $result=mysqli_query($con,$sql);
        if($result){
            $showAlert=true;
        }
    }


}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    require '../login_system/partial/nav.php'; ?>
    <?php
    if($showAlert){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You Account is Created and you can Login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <div class="container">
        <h1 class="text-center">Signup to our Website</h1>
        <form action="/PHP_TUTORIALS/login_system/signup.php" method="post">
            <div class="mb-3 ">
                <label for="username" class="form-label">User-name</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
               
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">Make Sure to type the same password.</div>
            </div>

            <button type="submit" class="btn btn-primary ">SignUp</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>