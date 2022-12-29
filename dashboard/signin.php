<?php session_start(); ?>
<?php
require 'login_layout/login_header.php';
require '../app/database/connection.php';
?>

<?php

if (isset($_POST['signin'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = hash('md5', $password);

    $result = $connection->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        $_SESSION['signin'] = $row['u_id'];
        header("Location: index.php?login=true");
    } else {
        header("Location: signin.php?login=false");
    }
}
?>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.php" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <form method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <?php if (isset($_GET['signin'])) {
                            if ($_GET['login'] !== 'true')
                                echo "<div style='color:red;'> login faild</div>";
                        } ?>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>

                        <button type="submit" name="signin" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require 'login_layout/login_footer.php' ?>