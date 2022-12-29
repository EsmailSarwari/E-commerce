<?php require '../app/session.php' ?>
<?php require 'dash_layout/dash_header.php' ?>
<?php require '../app/database/connection.php' ?>
<?php
$result = $connection->query("SELECT * FROM customer");
?>

<div class="container">
    <h3>Customers</h3>
    <table class="table table-hover">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <?php echo $row['name'] ?>
                </td>
                <td>
                    <?php echo $row['email'] ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<?php require 'dash_layout/dash_footer.php'; ?>