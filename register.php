<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

   <title>User Registration</title>

    <link rel="stylesheet" href="style.css" />
</head>


<body>
<h2>Register</h2>
<strong>Please fill this form to create an account.</strong>


	<form action="register_code_2.php" method="post">
    	    <label for="name">Name:</label> <br>
			<input class="form-control" type="text" name="name" required> <br>
			
			<label for="email">Email: </label> <br>
			<input class="form-control" type="text" name="email" required> <br>
			
			<label for="password">Password:</label> <br>
			<input class="form-control" type="password" name="password" required> <br>
    	<input type="submit" name="create" value="Submit">
    </form> <br>
    

    <!--<a href="display_DB.php">View Registered People</a>-->
    Already have an account?<a href="Login_code.php">Login here</a>



    </body>
</html>