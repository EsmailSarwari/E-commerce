<?php
session_start();
require_once 'layout/header.php';
require_once 'app/database/connection.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Quantity</th>
                </tr>
                <tr>
                    <td><?php
                    
                    print_r($_SESSION['sepet']);

                    foreach ($_SESSION['sepet'] as $key => $value) {

                        $p_id = $key;
                        $result = $connection->query("SELECT * FROM products WHERE p_id = $p_id");

                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['p_id'] ?></td>
                                <td><?php echo $row['name'] ?></td>
                                <td><?php echo $row['description'] ?></td>
                                <td><?php echo $row['size'] ?></td>
                                <td><?php echo $row['price'] ?></td>   
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
                                <td><?php echo $_SESSION['sepet'][$key] ?></td>   
                            </tr>
                            <?php }                         
                    }                    
                    ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<?php
require_once 'layout/footer.php';
?>