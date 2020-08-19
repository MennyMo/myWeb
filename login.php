<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

   <title>Login</title>

    <link rel="stylesheet" href="style.css" />
</head>


<body>
<h2>Login</h2>
<strong>Input your details.</strong>


	<form action="Login.php" method="post">
    	    
			
			<label for="email">Email: </label> <br>
			<input class="form-control" type="text" name="email" required> <br>
			
			<label for="password">Password:</label> <br>
			<input class="form-control" type="password" name="password" required> <br>
			<label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    	<input type="submit" name="create" value="Submit">
    </form> <br>

    <!--<a href="display_DB.php">View Registered People</a>-->
    Don't have an account?<a href="register.php">Register here.</a><label>
      
    


    </body>
</html>