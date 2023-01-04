<?php require '../app/session.php'?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

$result = $connection->query("SELECT * FROM products");

?>

<div class="container">
    <h3>Products</h3>
    <a class="btn btn-primary" href="add_product.php">Add Product</a>
    <br>
    <br>
    <?php if (isset($_GET['login'])) {
            if($_GET['login'] == 'true'){
                echo "<div class='alert alert-success'> <strong>Success! </strong> User Added Successfully</div>";
            }else{
                echo "<div class='alert alert-danger'> <strong>Faild! </strong>User Add Failed</div>";
            }      
        } ?>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Size</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>  
                <th>Delete</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['p_id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['description'] ?></td>
                <td><?php echo $row['size'] ?></td>
                <td><?php echo $row['price'] ?></td>
                <td><?php echo $row['quantity'] ?></td>    
                <td>
                    <a href="preview.php?p_id=<?php echo $row['p_id'];?>&q=photo">
                        <img width='30px' src="<?php echo $row['image'];?>"alt="img">
                    </a>
                </td>
                <td class="text-center">
                    <a href="edit_product.php?p_id=<?php echo $row['p_id'];?>&q=idenity" class="fa fa-edit"></a>
                </td>
                <td class="text-center">
                    <a href="delete_product.php?p_id=<?php echo $row['p_id'];?>&q=delete" class="fa fa-trash "></a>
                </td>
            </tr>
            <?php } ?>
        </table>
</div>


<?php require 'dash_layout/dash_footer.php'; ?>