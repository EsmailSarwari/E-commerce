<?php
require_once 'layout/header.php';
require_once 'app/database/connection.php';

$result = $connection->query("SELECT * FROM category");

?>
<div class="blue_bg">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>categories</h2>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div class="container">
      <div class="col-md-6 mx-auto ">
         <table class="table">
            <tr>
               <?php while ($row = $result->fetch_assoc()) { ?>
                  <td>
                     <a href="preview.php?ca_id=<?php echo $row['ca_id']; ?> &q=photo">
                        <img style="width:100px; height:100px;" src="<?php echo substr($row['image'], 3, strlen($row['image'])) ?>"
                           alt="img"><br>
                     </a>
                     <a href="all_products.php">
                        <span>
                           <?php echo $row['name']; ?>
                        </span>
                     </a>
                  </td>
               <?php } ?>
            </tr>
         </table>
      </div>
   </div>
</div>


<div id="project" class="project">
   <div class="container">
      <div class="row">
         <div class="col-md-10">
            <div class="titlepage">
               <h2>Featured Products</h2>
            </div>
         </div>
      </div>

      <?php $result1 = $connection->query("SELECT * FROM products"); ?>

      <div class="row">
         <div class="col-md-12 col-md-offset-6 mx-auto">
            <table>
               <tr>
                  <?php while ($row1 = $result1->fetch_assoc()) { ?>
                     <td>
                        <div class="img img-thumbnail">
                           <a href="all_products.php">
                              <img style="width:200px; height:200px;" src="<?php echo substr($row1['image'], 3, strlen($row1['image'])); ?>"
                                 alt="img">
                           </a>
                        </div>
                        <?php echo $row1['name'] ?> <br>
                        <?php echo $row1['price'] ?>
                     </td>
                  <?php } ?>
               </tr>
            </table>
         </div>
      </div>
      <div class="col-md-12">
         <a class="read_more" href="all_products.php">See More</a>
      </div>
   </div>
</div>


<?php
require_once 'layout/footer.php';
?>