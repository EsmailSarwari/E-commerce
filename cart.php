<?php
require_once 'layout/header.php';
require_once 'app/database/connection.php';

$result = $connection->query("SELECT * FROM products");
?>

<div class="container">
   <div class="col-md-12">
      <table class="table table-hover ">
         <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Size</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
         </tr>
         <?php while ($row = $result->fetch_assoc()) { ?>   
         <tr>
               <td>
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
                  <input style="border:none;" type="number" name="quantity" min="1" placeholder="1" >
               </td>
               <td class="fa fa-shopping-basket" >
                  <img width='30px' src="<?php echo $row['image']; ?>" alt="img">
               </td>
               <td>
                  <span class="fa fa-shopping-basket" ></span>
               </td>
               <?php } ?>
         </tr>
      </table>
   </div>
</div>


<?php require_once 'layout/footer.php'; ?>