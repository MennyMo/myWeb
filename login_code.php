<?php
require_once('db_connection.php');
require_once('login.php');

if (isset($_POST['create'])) {
	
	
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$password = md5($pwd);

	$user_check_query = "SELECT email FROM users 
                      WHERE email='$email' 
                      AND password='$password' LIMIT 1" or die(mysql_error());
    $result = mysqli_query($conn, $user_check_query);
    #echo mysql_fetch_array($result);
    #count row
    #$total = mysql_num_rows($result);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      if($count == 1) {
         session_register("email");
         $_SESSION['login_user'] = $email;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
               header('location: home1.php');

      }
 
   /* if ($total > 0) {
      # login...
      session_start();
      $_SESSION['email'] = 'you are welcome';
      header('location: welcome.php');
    }
    else{
      # do nothing...
      echo "register";
      header('location: home1.php');
    }*/
}
?>


<?php/*
// Initialize the session
session_start();
// Include config file
require_once('db_connection.php');
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = ""; 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter username.";
    } else{
        $email = trim($_POST["email"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM users WHERE email = ?";       
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_email = $email;            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, )){
                            // Password is correct, so start a new session
                            session_start();                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}*/
?>
 