<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

if (isset($_POST['name'])) {

    $ca_name = $_POST['name'];

    $result = $connection->query("INSERT INTO category (`name`) VALUES ('$ca_name')");
    if ($result) {
        echo "<script> window.location.href=\"category.php?add=success\" </script>";
    } else {
        echo "<script> window.location.hert=\"add_category.php?add=fail\" </script>";
    }
}
?>

<div class="container col-md-6 col-md-offset-3 mx-auto">
    <h3>New Category</h3>
    <form method="POST">
        <div class="form-group">
            <input type="text" name="name" , placeholder="Category Name">
        </div>
        <br>
        <button name="add" class="btn btn-primary">Add</button>
    </form>
</div>

<?php require 'dash_layout/dash_footer.php'; ?>