<?php require '../app/database/connection.php' ?>
<?php

if (isset($_GET['u_id']) && isset($_GET['q'])) {
    if ($_GET["q"] == "photo") {

        $id = $_GET['u_id'];

        $result = $connection->query("SELECT * FROM users WHERE u_id=" . $id);

        $row = $result->fetch_assoc();
    }
}


if (isset($_GET['p_id'])) {

        $id = $_GET['p_id'];

        $result = $connection->query("SELECT * FROM products WHERE p_id=" . $id);

        $row = $result->fetch_assoc();
}

if (isset($_GET['ca_id'])) {

    $id = $_GET['ca_id'];

    $result = $connection->query("SELECT * FROM category WHERE ca_id=" . $id);

    $row = $result->fetch_assoc();
}


?>

<div class="container">
    <img style="width:80%; height: 600px;" src="<?php echo $row['image']; ?>" alt="img">
</div>