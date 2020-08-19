<?php

session_start();

if (!isset($_SESSION['email'])) {
	# return to login page
	header('location: login.php');
}
  ?>
  you are logged in!