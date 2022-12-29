<?php require '../app/database/connection.php';

if (isset($_GET['ca_id'])) {

    $ca_id = $_GET['ca_id'];

    $result = $connection->query("DELETE FROM category WHERE ca_id=" . $ca_id);

    if ($result) {
        echo "<script> window.location.href=\"category.php?delete=true\"</script>";
    } else {
        echo "<script> window.location.href=\"delete_user.php?false=true\"</script>";
    }
}

