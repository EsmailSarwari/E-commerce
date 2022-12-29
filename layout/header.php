<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <title>romofyi</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
</head>

<body class="main-layout">
   <header>
      <div class="header">
         <div class="header_midil">
            <div class="container">
               <div class="row d_flex">
                  <div class="col-md-4">
                     <ul class="conta_icon d_none1">
                        <li><a href="#"><img src="images/email.png" alt="#" /> demo@gmail.com</a> </li>
                     </ul>
                  </div>
                  <div class="col-md-4">
                     <a class="logo" href="#"><img src="images/logo.png" alt="#" /></a>
                  </div>
                  <div class="col-md-4">
                     <ul class="right_icon d_none1">
                        <li><a href="#"><img src="images/shopping.png" alt="#" /></a> </li>
                        <a href="#" class="order">Order Now</a>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="header_bottom">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                           data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                           aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item <?php

                              if (substr(substr("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1), 0, -4) == "index")
                                 echo "active";

                              ?> ">
                                 <a class="nav-link " href="index.php">Home</a>
                              </li>
                              <li class="nav-item <?php

                              if (substr(substr("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1), 0, -4) == "about")
                                 echo "active";

                              ?> ">
                                 <a class="nav-link" href="about.php">About</a>
                              </li>
                              <li class="nav-item <?php

                              if (substr(substr("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1), 0, -4) == "products")
                                 echo "active";

                              ?> ">
                                 <a class="nav-link" href="products.php">Products</a>
                              </li>
                              <li class="nav-item <?php

                              if (substr(substr("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1), 0, -4) == "fashion")
                                 echo "active";

                              ?> ">
                                 <a class="nav-link" href="fashion.php">Fashion</a>
                              </li>
                              <li class="nav-item <?php

                              if (substr(substr("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1), 0, -4) == "contact")
                                 echo "active";

                              ?> ">
                                 <a class="nav-link" href="contact.php">Contact_Us</a>
                              </li>
                              <li class="nav-item <?php

                              if (substr(substr("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", strrpos("$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '/') + 1), 0, -4) == "login")
                                 echo "active";

                              ?> ">
                                 <a class="nav-link" href="login.php">SingUp/In</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-4">
                     <div class="search">
                        <form action="/action_page.php">
                           <input class="form_sea" type="text" placeholder="Search" name="search">
                           <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>