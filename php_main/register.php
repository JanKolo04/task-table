<?php
session_start();

    include("connection.php");

    if (array_key_exists("submit", $_POST)) {
        add();
    }

    function add() {
        global $con;

        //get login email passwd rpasswd
        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['passwd'];
        $rpassword = $_POST['rpasswd'];

        //insert into databse
        $sql = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password')";


        if ($password != $rpassword) {
            echo '<script type="text/javascript">alert("Passwords is differends!");</script>';
        }

        else {
            $query = mysqli_query($con, $sql);
            header("Location: login.php");
        }
    }


?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/t.png">
    <link rel="stylesheet" type="text/css" href="style-register.css">
    <title>Register</title>
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
                            <input type="submit" name="submit" value="Submit" class="submit" id="submit">
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