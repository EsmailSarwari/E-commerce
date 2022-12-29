<?php require '../app/session.php'?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>
<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $psd = $_POST['psd'];
    $utype = $_POST['utype'];

    $src = $_FILES['file']['tmp_name'];
    $des = '../user_uploads/' . time() . $_FILES['file']['name'];

    move_uploaded_file($src, $des);

    $psd = hash("md5", $psd);

    $result = $connection->query("INSERT INTO users VALUES(null, '$name', '$email', '$psd', '$utype', '$des')");

    if ($result) {
        echo "<script> window.location.href=\"users.php?login=true\" </script>";
    } else {
        echo "<script> window.location.href=\"add_user?login=false\" </script>";
    }
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>Create Your account</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="psd" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="cfrm_psd" placeholder="Confirm Password" class="form-control">
                </div>
                <div class="form-group">
                    <select name="utype" class="form-control">
                        <option>Administrator</option>
                        <option>User</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                <div>
                    <input type="submit" name="submit" value="Register" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>


<?php include 'dash_layout/dash_footer.php'; ?>