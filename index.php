<?php

require 'function.php';
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
$products = query("SELECT * FROM products");

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Pet Shop</title>

    <link rel="shortcut icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
<!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php">
          <img class="brand" src="img/logotext.png" alt="logo">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <a class="navbar-brand" href="index.php">
            <img class="brand" src="img/logotext.png" alt="logo">
          </a>
          <li class="nav-item">
            <a class="nav-link" href="#product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#service">Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#location">Location</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-1">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search fa-1x"></i></button>
        </form>
        <div class="right-navbar">
          <ul class="navbar-nav mr-auto">
              <a class="nav-link"><i class="fas fa-shopping-cart"></i></a>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="login.php">Login</a>
                <a class="dropdown-item" href="register.php">Register</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

<!-- slide -->
    <div class="img-slide" id="slide">
      <div class="slide">
        <center class="big-brand">
          <a class="" href="#">
            <img src="img/logo.png" alt="">
          </a>
        </center>
        <div class="register-promo">
          <p>REGISTER TO GET DISCOUNT VOUCHER</p>
          <a class="btn btn-outline-success" href="register.php">REGISTER</a>
        </div>
          <a class="scrollTo" href="#product">
            <i class="fas fa-arrow-alt-circle-down fa-3x"></i>
          </a>
      </div>
    </div>

<!-- product -->
    <div class="content" id="product">
      <div class="container">
        <div class="row">
          <?php foreach($products as $product): ?>
          <div class="col-sm-4">
            <div class="card product" style="width: 18rem;">
              <img src="img/products/<?= $product["product_img_name"]?>" class="lazy-load" height="200px" alt="gambar rusak">
              <div class="card-body">
                <?php for ($i=0; $i < $product["product_rating"]; $i++) { ?>
                  <span class="fa fa-star checked"></span>
                <?php }?>
                <h5 class="card-title"><?= $product["product_name"]?></h5>
                <p class="price">Rp<?= $product["price_product"]?>,-</p>
                <p class="card-text"><?= $product["product_desc"]?></p>
                <a href="#" class="btn btn-primary">ADD TO CART</a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <img src="img/<?php echo $data['id'] ?>" alt="">
      </div>
    </div>

<!-- Location -->
    <div class="container" id="location">
      <div class="jumbotron location">
        <h1 class="display-4">Our Service</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </div>
    </div>

<!-- footer -->
    <footer>
      <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h2>INFORMATION</h2>
              <br><a href="#">About Us</a>
              <br><a href="#">Contact Us</a>
              <br><a href="#">Find Us</a>
            </div>
            <div class="col-md-4">
              <h2>Contact Us</h2>
              <br><a href="#">Jl. Babarsari no 24, Depok</a>
              <br><a href="#">082133882546</a>
              <br><a href="#">Line : @petshop</a>
            </div>
            <div class="col-md-4">
              <h2>Newsteller</h2>
              <br>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.
              <br><input type="email" name="" value=""><button type="submit" name="button"></button>
            </div>
          </div>
        </div>
        <div class="copyright">
          Copyright (c) 2019 Copyright Holder All Rights Reserved.
        </div>
      </footer>

      <script type="text/javascript">
        var load = window.addEventListener("load", function() {


        });
        var resize = window.addEventListener("resize", function() {


        });
        var scroll = window.addEventListener("scroll", function() {


        });
        function loadImages() {
          var images = document.querySelectorAll(".lazy-load");

          for (var i = 0; i < immage.length; i++) {
            var imageBounds = images[i].getBoundingClientRect();

            if (imageBounds.top >= 0 &&
                imageBounds.left >= 0 &&
                imageBounds.bottom <= window.innerHeight &&
                imageBounds.right <= window.innerWidht) {
                  images[i].src = "i"
            }
          }
        }
      </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
