<?php
session_start();
require_once 'layout/header.php';
require_once 'app/database/connection.php';


$result = $connection->query("SELECT * FROM products");
/*
if (isset($_POST['order'])) {
$pname = $_POST['name'];
$pdescription = $_POST['description'];
$pprice = $_POST['price'];
$pquantity = $_POST['quantity'];
$psize = $_POST['size'];
$sql = "INSERT INTO orders VALUES (null, '$pname', '$pdescription', '$pprice', '$pquantity', '$psize')";
}
*/

?>

<div class="container">
   <div class="col-md-12">

      <table class="table table-hover ">
         <br>
         <tr>
            <h3 style="color:orange;">Shop and send them to your loved one's</h3>
         </tr>
         <br>
         <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
         </tr>
         <?php while ($row = $result->fetch_assoc()) { ?>
            <form method="post" action="">
               <tr>
                  <td>
                     <input style="border:none;" type="hidden" name="<?php echo $row['p_id'] ?>"
                        value="<?php echo $row['p_id'] ?>">
                     <?php echo $row['name'] ?>
                  </td>
                  <td>
                     <?php echo $row['description'] ?>

                  </td>
                  <td>
                     <?php echo $row['size'] ?>
                  </td>
                  <td>
                     <?php echo $row['price'] ?>
                  </td>
                  <td>
                     <input style="border:none;" type="number" name="quantity" min="1" value="1" placeholder="select">
                  </td>
                  <td>
                     <img width='30px' src="<?php echo substr($row['image'], 3, strlen($row['image'])); ?>" alt="img">
                  </td>
                  <td>
                     <button class="btn btn-warning" name="order">Order</button>
                  </td>
            </form>
         <?php }

         if (isset($_POST['order'])) {
            $id = array_key_first($_POST);

            if (isset($_SESSION["sepet"]["$id"])) {
               $_SESSION["sepet"]["$id"] += $_POST['quantity'];

            } else {
               $_SESSION["sepet"]["$id"] = $_POST['quantity'];
            }
            echo ("<script>location.href = 'cart.php';</script>");


            //$_SESSION["sepet"] = array();
         
            //unset($_SESSION["sepet"]["6"]);
         
            print_r($_SESSION["sepet"]);

            $_POST = array();
         }

         ?>
         </tr>
      </table>
   </div>
</div>


<?php require_once 'layout/footer.php'; ?>