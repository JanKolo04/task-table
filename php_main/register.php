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
    <link rel="stylesheet" type="text/css" href="css/style-register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
    <title>Register</title>
</head>
<body>

    <div class="main">
        <div class="white-background">


        
            <h1 id="text1">Register</h1>
            <p id="text2">Enter login e-mail and password to create account</p>

            <div class="allStuff">
                <form method="POST">
                    <table id="table">
                        <tr class="record">
                            <td>
                                <input type="text" id="login" name="login" required placeholder="Login">
                            </td>
                            <td>
                                <input type="text" id="email" name="email" required placeholder="E-mail">
                            </td>
                        </tr>

                        <tr class="record">
                            <td>
                                <input type="password" id="passwd" name="passwd" required placeholder="Password">
                                <i class="bi bi-eye-slash" id="togglePassword1"></i>
                            </td>
                            <td>
                                <input type="password" id="rPasswd" name="rpasswd" required placeholder="Repeat Password">
                                <i class="bi bi-eye-slash" id="togglePassword2"></i>
                            </td>
                        </tr>
                    </table>


                    <div class="submit-login">
                        <div id="submit-div">
                            <button type="submit" name="submit" class="submit" id="submit">Submit</button>
                        </div>

                        <div id="login-div">
                            <p id="loginText">If you have an account? <a id="loginLink" href="login.php">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
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