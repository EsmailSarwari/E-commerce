<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

$result = $connection->query("SELECT * FROM category");

?>

<div class="container col-md-6 col-md-offset-3 mx-auto">
    <?php if (isset($_GET['update'])) {
    if ($_GET['update'] == 'true') {
        echo "<div class='alert alert-success'> <strong>Success! </strong> User Update Successfully</div>";
    } else {
        echo "<div class='alert alert-danger'> <strong>Faild! </strong>User Update Failed</div>";
    }
} ?>
    <h3>Category List</h3>
    <a href="add_category.php" class="btn btn-primary">Add Category</a>
    <br>
    <br>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['ca_id'] ?> </td>
                    <td>
                        <?php echo $row['name'] ?>
                    </td>
                    <td>
                        <a href="preview.php?ca_id=<?php echo $row['ca_id']; ?> &q=photo">
                            <img width='30px' src="<?php echo $row['image']; ?>" alt="img">
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="edit_category.php?ca_id=<?php echo $row['ca_id']; ?> &category" class="fa fa-edit"></a>
                    </td>
                    <td class="text-center">
                        <a href="delete_category.php?ca_id=<?php echo $row['ca_id']; ?> &category" class="fa fa-trash "></a>
                    </td>
                </tr>
                <?php } ?>
        </table>
    </div>
</div>


<?php require 'dash_layout/dash_footer.php'; ?>