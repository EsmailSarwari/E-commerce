<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

if (isset($_POST['add'])) {

    $ca_name = $_POST['name'];

    $src = $_FILES['image']['tmp_name'];    
    $dest = '../images/'.time() . $_FILES['image']['name'];

    move_uploaded_file($src, $dest);

    $result = $connection->query("INSERT INTO `category`(`name`, `image`) VALUES ('$ca_name','$dest')");
    if ($result) {
        echo "<script> window.location.href=\"category.php?add=success\" </script>";
    } else {
        echo "<script> window.location.hert=\"add_category.php?add=fail\" </script>";
    }
}
?>

<div class="container col-md-6 col-md-offset-3 mx-auto">
    <h3>New Category</h3>
    <form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
            <input type="text" name="name" , placeholder="Category Name" class="form-control" >
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control" >
        </div>
        <br>
        <button name="add" class="btn btn-primary">Add</button>
    </form>
</div>

<?php require 'dash_layout/dash_footer.php'; ?>