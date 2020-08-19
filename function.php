
<?php
function CheckEmailExistsOrNot($email){
	global $conn;
	$sql= "SELECT * FROM users WHERE email= '$email'";
	$result = mysqli_query($conn, $sql);
	if	(mysql_num_rows($result)>0){
	return true;	
}else {
	return false;
}
	}




?>