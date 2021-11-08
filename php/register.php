<?php
session_start();

    include("connection.php");

    //posted items
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];
    $rpassword = $_POST['rpasswd'];


    $sql = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password')";

    if(!empty($login) && !empty($email) && !empty($password) && !empty($rpassword)) {
        if ($password != $rpassword) {
            session_start();
        }

        else if ($con->query($sql) === TRUE) {
            header("Location: login.php");
        } 

        else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    else {
        $con->close();
    }


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="style-register.css">
    <script type="text/javascript" src="script-register.js"></script>
</head>
<body>

    <div class="main">
        <div class="white-background">


        
            <h1 id="text1">Register</h1>
            <p id="text2">Enter login e-mail and password to create account</p>

            <div class="allStuff">
                <form method="post">

                    <div class="login-email">
                        <div class="Login">
                            <center><input type="text" id="login" name="login" required placeholder="Login"></center>
                        </div>

                        <div class="Email">
                            <center><input type="text" id="email" name="email" required placeholder="E-mail"></center>
                        </div>
                    </div>


                    <div class="passwords">
                        <div class="passwd1">
                            <center><input type="password" id="passwd" name="passwd" required placeholder="Password"></center>
                        </div>

                        <div class="passwd2">
                            <center><input type="password" id="rPasswd" name="rpasswd" required placeholder="Repeat Password"></center>
                        </div>
                    </div>


                    <div class="submit-login">
                        <div id="submit-div">
                            <input type="submit" value="Submit" class="submit" id="submit" onclick="correctPasswd()">
                        </div>

                        <div id="login-div">
                            <p id="loginText">If you have an account? <a id="loginLink" href="login.php">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>