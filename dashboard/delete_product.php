<?php require '../app/database/connection.php';

if (isset($_GET['p_id'])) {

    $id = $_GET['p_id'];

    $result = $connection->query("DELETE FROM products WHERE p_id=" . $id);

    if ($result) {
        echo "<script> window.location.href=\"products.php?delete=true\"</script>";
    } else {
        echo "<script> window.location.href=\"delete_product.php?false=true\"</script>";
    }
}