<?php require '../app/session.php'?>
<?php require '../app/database/connection.php';

if (isset($_GET['u_id'])) {

    $id = $_GET['u_id'];

    $result = $connection->query("DELETE FROM users WHERE u_id=" . $id);

    if ($result) {
        echo "<script> window.location.href=\"users.php?delete=true\"</script>";
    } else {
        echo "<script> window.location.href=\"user_delete.php?false=true\"</script>";
    }
}

