<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

if (isset($_GET['ca_id'])) {

    $ca_id = $_GET['ca_id'];

    $result = $connection->query("SELECT * FROM category WHERE ca_id=". $ca_id);

    $row = $result->fetch_assoc();

}

if (isset($_POST['update'])) {
    $up_name = $_POST['name'];
    $ca_id = $_GET['ca_id'];

    $result = $connection->query("UPDATE category SET name='$up_name' WHERE ca_id =" . $ca_id);

    if ($result) {
        echo "<script> window.location.href=\"category.php?update=true\" </script>";
    } else {
        echo "<script> window.location.href=\"edit_category.php?update=false\" </script>";
    }
}
?>

<div class="container col-md-6 col-md-offset-3 mx-auto">
    <h3>Update Category</h3>
    <form method="POST">
        <div class="form-group">
            <input type="text" name="name" , placeholder="Update Category Name" value="<?php echo $row['name']; ?>" >
        </div>
        <br>
        <button name="update" class="btn btn-primary">Update</button>
    </form>
</div>

<?php require 'dash_layout/dash_footer.php'; ?>