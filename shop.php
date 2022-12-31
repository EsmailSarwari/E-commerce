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
               <h2>Featured Products</h2>
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
                        <img width='30px' src="<?php echo $row['image']; ?>" alt="img"><br>
                     </a>
                     <a href="cart.php">
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

<?php require_once 'layout/footer.php'; ?>


<!-- project section -->
<div id="project" class="project">
   <div class="container">

      <div class="row">
         <div class="product_main">

            <div class="project_box ">
               <div class="dark_white_bg"><img src="images/shoes1.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box ">
               <div class="dark_white_bg"><img src="images/shoes2.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/shoes3.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/shoes4.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/shoes5.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>


            <div class="project_box ">
               <div class="dark_white_bg"><img src="images/tisat1.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box ">
               <div class="dark_white_bg"><img src="images/tisat2.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/tisat3.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/tisat4.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/tisat5.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>


            <div class="project_box ">
               <div class="dark_white_bg"><img src="images/mix1.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box ">
               <div class="dark_white_bg"><img src="images/mix2.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/mix3.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/mix4.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="project_box">
               <div class="dark_white_bg"><img src="images/mix5.png" alt="#" /></div>
               <h3>Short Openwork Cardigan $120.00</h3>
            </div>

            <div class="col-md-12">
               <a class="read_more" href="#">See More</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end project section -->
<?php
require_once 'layout/footer.php';
?>