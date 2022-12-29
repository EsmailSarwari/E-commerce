<?php 
	session_start();

	if (!isset($_SESSION['signin'])) 
	echo "<script> window.location.href=\"../dashboard/signin.php?session=false\" </script>";
	