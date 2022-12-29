<?php require '../app/database/connection.php' ?>
<?php

    if (isset($_GET['u_id']) && isset($_GET['q'])) {
        if ($_GET["q"] == "photo") {

            $id = $_GET['u_id'];

            $result = $connection->query("SELECT * FROM users WHERE u_id=" . $id);

            $row = $result->fetch_assoc();
        }
    }
?>

<div class="container">
    <img style="width:80%; height: 600px;" src="<?php echo $row['image']; ?>" alt="img">
</div>