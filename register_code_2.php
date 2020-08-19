<?php
require_once('db_connection.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$name = $email = $password = '';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$password = md5($pwd);

	$user_check_query = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user){
    #	var_dump("user found");
    	if ($user['name'] == $name) {
    		echo "Name Already exists";
      	}
      	if ($user['email'] == $email) {
      		echo "Email Already exists";
      	}
    }
    else{
   		$sql = "insert into users(name, email, password) values ('$name', '$email', '$password')";
   		if ($conn->query($sql)) {
   			echo "You have successfully registered";
   			header("location: welcome.php");
   		}else{
   			echo "Sorry, there was a problem while trying to sign you in.";
   		}

    	//var_dump("user not found");

    }
}
