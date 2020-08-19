<!--Here, we write code for registration.
-->
<?php

require_once('db_connection.php');
var_dump($_POST);

if(isset($_POST)){
	$name = $email = $password = '';
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pwd = $_POST['password'];
	$password = md5($pwd);

$user_check_query = "SELECT * FROM users WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      echo "Name Already exists";
    }


    if ($user['email'] === $email) {
      echo "Email Already exists";
    }
}
  
  elseif(!$user)
  	{
  		#$sql = "INSERT INTO users(name, email, password) VALUES(?,?,?)";
  		$sql = "insert into (name, email, password) values ('$name', '$email', '$pwd')";

		    $stmtinsert = $conn->query($sql);
		    //var_dump($stmtinsert);

		    //$j=$stmtinsert->execute([$name, $email,$pwd]);
		    if ($stmtinsert) { 
		    
		    	echo "You have successfully registered";
		    }
		    else { 
		    	echo "Sorry, there was a problem while trying to sign you in.";
		    	
		    }

  }
  



}




?>
