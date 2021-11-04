<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: profil.html");
    exit;
}
 
// Include config file
require_once "connection.php";
 
// Define variables and initialize with empty values
$login = $password = "";
$login_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if login is empty
    if(empty(trim($_POST["login"]))){
        $login_err = "Please enter login.";
    } else{
        $login = trim($_POST["login"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["passwd"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["passwd"]);
    }
    
    // Validate credentials
    if(empty($login_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT login, password FROM users WHERE login = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_login);
            
            // Set parameters
            $param_login = $login;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if login exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $login, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["login"] = $login;                            
                            
                            // Redirect user to welcome page
                            header("location: profil.html");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid login or password.";
                        }
                    }
                } else{
                    // login doesn't exist, display a generic error message
                    $login_err = "Invalid login or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>