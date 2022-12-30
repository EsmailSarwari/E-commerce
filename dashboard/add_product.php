<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

if (isset($_POST['name'])) {

    $p_name = $_POST['name'];
    $p_desc = $_POST['desc'];
    $p_size = $_POST['size'];
    $p_price = $_POST['price'];
    $p_quant = $_POST['quant'];

    $src = $_FILES['image']['tmp_name'];
    $des = '../images/' . time() . $_FILES['image']['name'];

    move_uploaded_file($src, $des);

    $result = $connection->query("INSERT INTO products VALUES 
    (null, '$p_name' , '$p_desc', '$p_size', '$p_price', '$p_quant', '$des')");
    if ($result) {
        echo "<script> window.location.href=\"products.php?add=success\" </script>";
    } else {
        echo "<script> window.location.hert=\"add_product.php?add=fail\" </script>";
    }
}
?>

<div class="container col-md-6 col-md-offset-3 mx-auto">
    <h3>Add New Product</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="name" , placeholder="Name" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="desc" , placeholder="Description" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="size" , placeholder="Size" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="price" , placeholder="Price" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="quant" , placeholder="Quantity" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="image" , class="form-control">
        </div>
        <br>
        <button name="add" class="btn btn-primary">Add</button>
    </form>
</div>

<?php require 'dash_layout/dash_footer.php'; ?>