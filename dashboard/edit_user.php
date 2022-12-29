<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>


<?php

if (isset($_GET['u_id'])) {

    $id = $_GET['u_id'];

    $result = $connection->query("SELECT * FROM users WHERE u_id=" . $id);

    $row = $result->fetch_assoc();

}

if (isset($_POST['update'])) {
    $up_name = $_POST['name'];
    $up_email = $_POST['email'];
    $up_utype = $_POST['utype'];

    $result = $connection->query("UPDATE users SET name='$up_name', email='$up_email', user_type='$up_utype' WHERE u_id=" . $id);

    if ($result) {
        echo "<script> window.location.href=\"users.php?update=true\" </script>";
    } else {
        echo "<script> window.location.href=\"edit_user.php?false=true\" </script>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h3>Edit Your Idendity </h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Name" class="form-control"
                        value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email" class="form-control"
                        value="<?php echo $row['email']; ?>">
                </div>
                <div class="form-group">
                    <select name="utype" class="form-control" value="<?php echo $row['utype']; ?>">
                        <option>Administrator</option>
                        <option>User</option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="update" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require 'dash_layout/dash_footer.php'; ?>