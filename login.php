<link rel="stylesheet" href="css/style_login.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>


<?php
require_once 'app/database/connection.php';

if (isset($_POST['signup'])) {
  $fullName = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cfrmpass = $_POST['confirmpassword'];

  hash("md5", $password);
  
    $result = $connection->query("INSERT INTO customer VALUES (null, '$fullName', '$email', '$password')");
    if ($result) {
      header('location:login.php?signup=success');
    } else {
      header('location:login.php?signup=fail');
    }
}

if (isset($_POST['signin'])) {
  $username = $_POST['username'];
  $password = $_POST['psd'];

  $result = $connection->query("SELECT * FROM customer WHERE email = '$username' AND password = '$password'");
  if ($result->num_rows == 1) {
    header('location:card.php?login=success');
  } else {
    header('location:login.php?login=fail');
  }
}



?>

<div class="container">
  <div class="frame">
    <div class="nav">
      <ul class="links">
        <li class="signin-active"><a class="btn">Sign in</a></li>
        <li class="signup-inactive"><a class="btn">Sign up </a></li>
      </ul>
    </div>
    <div ng-app ng-init="checked = false">

      <form class="form-signin" action="" method="POST" name="form">
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="" class="form-styling" />
          <label for="password">Password</label>
          <input type="password" name="psd" placeholder="" class="form-styling" />
          <input type="checkbox" id="checkbox" name='checked' />
          <label for="checkbox"><span class="ui"></span>Keep me signed in</label>
          <div class="btn-animate">
              <button class="btn-signin" name='signin'>Sign in</button>
          </div>
      </form>

      <form class="form-signup" action="" method="POST" name="form">
        <label for="fullname">Full name</label>
        <input class="form-styling" type="text" name="fullname" placeholder="" />
        <label for="email">Email</label>
        <input class="form-styling" type="text" name="email" placeholder="" />
        <label for="password">Password</label>
        <input class="form-styling" type="password" name="password" placeholder="" />
        <label for="confirmpassword">Confirm password</label>
        <input class="form-styling" type="password" name="confirmpassword" placeholder="" />
        <button ng-click="checked = !checked" name="signup" class="btn-signup">Sign Up</button>
      </form>


      <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
      <script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
      <script src="js/script_login.js"></script>