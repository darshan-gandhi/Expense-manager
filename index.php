<?php
    include_once("User.class.php");
    if(isset($_POST["login"])){
        $name = $_POST["username"];
        $pass = $_POST["password"];
        $obj = new User();
        $obj->checkLogin($name,$pass);
    }else if(isset($_POST["signup"])){
        $name = $_POST["username"];
        $pass = $_POST["password"];
        $cpass = $_POST["cpassword"];
        if($pass === $cpass){
            $obj = new User();
            $obj->insert($name,$pass);
        }
        
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Travnal</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./stylesheets/main.css">
    <link rel="icon" href="/images/paper-plane.png">
</head>
<body>
    <div class="brand row">
        <h1>Money Split</h1>
    </div>
    <div class="row">
        <div class="container">
            <div class="col-md-1"></div>            
            <div class="col-md-4 login signin">
                <div class="row">
                    <h2 class="signin-text">Log In</h2>
                </div>
                <form action="" method="POST">
                    <h3>Username</h3>
                    <input name="username" type="text" class="form-control" placeholder="JohnDoe">
                    <br>
                    <h3>Password</h3>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <br><br>
                    <button type="submit" name="login" class="btn btn-primary signup" >Login</button>
                    <br><br>
                </form>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4 login">
                <div class="row">
                    <h2 class="signin-text">Sign Up</h2>
                </div>
                <form action="" method="POST">
                    <h3>Username</h3>
                    <input type="text" name="username" class="form-control" placeholder="JohnDoe">
                    <br>
                    <h3>Password</h3>
                    <input type="password" name="password" class="form-control" placeholder="password">
                    <br>
                    <h3>Confirm Password</h3>
                    <input type="password" name="cpassword" class="form-control" placeholder="password">
                    <br><br>
                    <button type="submit" name= "signup" class="btn btn-primary signup">Sign Up</button>
                    <br><br>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="footer">
        Developed with ❤ by kangal log
    </div>
</body>
</html>