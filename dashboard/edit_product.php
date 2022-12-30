<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

if (isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];

    $result = $connection->query("SELECT * FROM products WHERE P_id =" . $p_id);

    $row = $result->fetch_assoc();
}


if (isset($_POST['update'])) {

    $p_id = $_GET['p_id'];

    $up_name = $_POST['name'];
    $up_desc = $_POST['description'];
    $up_size = $_POST['size'];
    $up_price = $_POST['price'];
    $up_quant = $_POST['quantity'];

    $src = $_FILES['image']['tmp_name'];
    $des = 'img/' . time() . $_FILES['image']['name'];

    move_uploaded_file($src, $des);

    $result = $connection->query("UPDATE products SET name='$up_name', description='$up_desc', 
    size='$up_size', price='$up_price', quantity='$up_quant', image='$des' WHERE P_id =" . $p_id);

    if ($result) {
        echo "<script> window.location.href=\"products.php?edit=true\" </script>";
    } else {
        echo "<script> window.location.href=\"edit_category.php?edit=false\" </script>";
    }
}
?>

<div class="container col-md-6 col-md-offset-3 mx-auto">
    <h3>Edit Your Product Details </h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="description" placeholder="Description" value="<?php echo $row['description'];?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="size" placeholder="Size" value="<?php echo $row['size']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="price" placeholder="Price" value="<?php echo $row['price']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="text" name="quantity" placeholder="Quantity" value="<?php echo $row['quantity']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="image" class="form-control">
        </div>
        <br>
        <button name="update" class="btn btn-primary">Update</button>
    </form>
</div>


<?php require 'dash_layout/dash_footer.php'; ?>