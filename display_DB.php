<!DOCTYPE html>
<html>
<head>
	<title>Display Data from DB</title>
	<style type="text/css">
		table{
			border: 2px solid red;
			background-color: #FFC;
		}
		th{
			border-bottom: 5px solid #000;
		}
		td{
			border-bottom: 2px solid #555;

		}
	</style>

</head>
<body>
	<h1>Display Data from Database</h1>
	<?php

	include('db_connection.php');
	$sqlget = "SELECT * FROM users";
	$result = mysqli_query($conn, $sqlget) or die('error getting data');
	
    echo "<table>";
    echo "<tr>
    <th>ID</th><th>Name</th><th>Email</th>
    </tr>";

	require_once('page_no.php');
	
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    	echo "<tr><td>";
    	echo $row['id'];
    	echo "</td><td>";
    	echo $row['name'];
    	echo "</td><td>";
    	echo $row['email'];
    	echo "</td></tr>";
    }
    echo "</table>";

	 ?>

</body>
</html>