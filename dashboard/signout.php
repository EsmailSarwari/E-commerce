<?php 

require '../app/session.php';

session_unset();

header('location:signin.php?logout=success');

?>