<?php require '../app/session.php'?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>

<?php

$result = $connection->query("SELECT * FROM users");

?>

<div class="container">
    <h3>Users List</h3>
    <a class="btn btn-primary" href="add_user.php">Add User</a>
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
                <th>Email</th>
                <th>UserType</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['u_id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['user_type'] ?></td>
                <td>
                    <a href="preview.php?u_id=<?php echo $row['u_id']; ?> &q=photo">
                        <img width='30px' src="<?php echo $row['image'] ?>" alt="img">
                    </a>
                </td>
                <td class="text-center">
                    <a href="edit_user.php?u_id=<?php echo $row['u_id']; ?> &q=idenity" class="fa fa-edit"></a>
                </td>
                <td class="text-center">
                    <a href="delete_user.php?u_id=<?php echo $row['u_id'];?> &q=delete" class="fa fa-trash "></a>
                </td>
            </tr>
            <?php } ?>
        </table>
</div>


<?php require 'dash_layout/dash_footer.php'; ?>