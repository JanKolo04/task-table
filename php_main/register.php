<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/t.png">
    <link rel="stylesheet" type="text/css" href="css/style-register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    <title>Register</title>
</head>
<body>



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

        //get login to check if someone was singed up
        $checkLogin = "SELECT login FROM users WHERE login='$login'";
        $queryLogin = mysqli_query($con, $checkLogin);

        //add results from array
        $login_arr;
        foreach($queryLogin as $key) {
            $login_arr = $key;
        }


        //get email to check if someone was singed up
        $checkEmail = "SELECT email FROM users WHERE email='$email'";
        $queryEmail = mysqli_query($con, $checkEmail);

        //add results from array
        $email_arr;
        foreach($queryEmail as $key) {
            $email_arr = $key;
        }

        //if someone wasn't singed up with login and email
        if(!isset($login_arr) & !isset($email_arr)) {
            //insert into databse
            $sql = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password')";

            //if passwords are diferents show alert
            if ($password != $rpassword) {
                echo '<script type="text/javascript">alert("Passwords is differends!");</script>';
            }

            else {
                $query = mysqli_query($con, $sql);
                header("Location: login.php");
            }
        }

        //if someone was singed up with logi
        else if(isset($login_arr)) {
            echo "<script>alert('Someone was singed up about this login');</script>";
        }
        //if someone was singed up with email
        else if(isset($email_arr)) {
            echo "<script>alert('Someone was singed up about this email');</script>";
        }
    }


?>


    <div class='baner'>
        <div class='textBaner'>
            <h1 id='banerText'>TASK BOARD</h1>
        </div>
    </div>

    <div class="white-background">
    
        <div id="textsDiv">
            <div id="mainText">
                <h1 id="text1">Register</h1>
            </div>
            <div id="secondText">
                <p id="text2">Enter login e-mail and password to create account</p>
            </div>
        </div>

        <div class="allStuff">
            <form method="POST">

                <div id="inputsDiv">
                    <div id="loginDiv">
                        <input type="text" id="login" name="login" required placeholder="Login">   
                    </div>

                    <div id="registerDiv">
                        <input type="text" id="email" name="email" required placeholder="E-mail">
                    </div>

                    <div id="passwd1Div">
                        <input type="password" id="passwd" name="passwd" required placeholder="Password">
                        <i class="bi bi-eye-slash" id="togglePassword1"></i>
                    </div>

                    <div id="passwd2Div">
                        <input type="password" id="rPasswd" name="rpasswd" required placeholder="Repeat Password">
                        <i class="bi bi-eye-slash" id="togglePassword2"></i>
                    </div>
                </div>


                <div class="submit-login">
                    <div id="submit-div">
                        <button type="submit" name="submit" class="submit" id="submit">Submit</button>
                    </div>

                    <div id="login-div">
                        <p id="loginText">If you have an account? <a id="loginLink" href="login">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        var button1 = document.getElementById("togglePassword1");
        var button2 = document.getElementById("togglePassword2");

        var input1 = document.getElementById("passwd");
        var input2 = document.getElementById("rPasswd");

        button1.onclick = function() {

            if(input1.type == "password") {
                input1.setAttribute("type", "text");
                button1.className = "bi bi-eye";
            }

            else {
                input1.setAttribute("type", "password");
                button1.className = "bi bi-eye-slash";

            }

        }


        button2.onclick = function() {

            if(input2.type == "password") {
                input2.setAttribute("type", "text");
                button2.className = "bi bi-eye";
            }

            else {
                input2.setAttribute("type", "password");
                button2.className = "bi bi-eye-slash";

            }

        }
    </script>


</body>
</html>