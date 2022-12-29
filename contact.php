<?php
require_once 'layout/header.php';
require('app/database/connection.php');
// require 'app/session.php';

   if(isset($_POST['send'])){

      $name = $_POST['Name'];
      $phone = $_POST['Phone'];
      $email = $_POST['Email'];
      $address = $_POST['Address'];
      $message = $_POST['msg'];

      $src = $_FILES['file']['tmp_name'];      
      $dest = 'user_uploads/'.time().$_FILES['file']['name'];     

      move_uploaded_file($src, $dest);
      
      $result = $connection->query("INSERT INTO feedback VALUES (null,  '$name', '$phone', '$email', '$address', '$message')");
      move_uploaded_file($src, $dest);

      echo "<script>alert('Thank you for your feedback')</script>";
   }
?>
<div class="blue_bg">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2>Contact Us</h2>
            </div>
         </div>
      </div>
   </div>
</div>

<div id="contact" class="contact">
   <div class="con_bg">
      <div class="container">
         <div class="row">
            <div class="col-md-10 offset-md-1">
               <h1>Your Feedback Make Us Serve Better</h1>
               <form id="request" class="main_form" method="POST" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="Name" type="type" name="Name"> 
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="Phone Number" type="type" name="Phone"> 
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="Email" type="type" name="Email">                          
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <input class="contactus" placeholder="Address" type="type" name="Address">                          
                     </div>
                     <div class="col-md-12">
                        <input class="contactusmess" placeholder="Message" type="type" name="msg" >
                     </div>
                     <div class="col-md-6">
                        <h3>would you like to add a file ?</h3>
                        <input type="file" name="file">
                     </div>                     
                     <div class="col-md-12">
                        <button class="send_btn" name='send'>Send</button>
                     </div>  
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require_once 'layout/footer.php'; ?>