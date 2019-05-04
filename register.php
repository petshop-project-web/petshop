<?php
require 'function.php';
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
/* if(session_id() == '' || !isset($_SESSION)){session_start();} */

if( isset($_POST["submit"]) ){
  if( register($_POST) > 0 ){
      echo "
          <script>
              alert('Selamat Datang di Dunia Hewan');
              document.location.href='index.php';
          </script>
      ";
  } else {
      echo "
          <script>
              alert('Mohon Daftar Ulang');
              document.location.href='register.php';
          </script>
      ";
  }
}
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
            <a class="nav-link" href="index.php">Product</a>
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

    <!-- login form -->
    <div class="register">
      <div class="row">
        <h2>Register</h2>
      </div>

      <!-- FORM REGISTER -->
      <form action="" method="post">
        <div class="form-group">
          <label for="first_name">Nama Depan</label>
          <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Nama Depan" required>
          <small id="first_name" class="form-text text-muted">Masukan Nama Depan</small>
        </div>
        <div class="form-group">
          <label for="last_name">Nama Belakang</label>
          <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Nama Belakang" required>
          <small id="last_name" class="form-text text-muted">Masukan Nama Belakang</small>
        </div>
        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Email" required> 
          <small id="email" class="form-text text-muted">Masukan Alamat E-mail</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          <small id="password" class="form-text text-muted">Masukan password yang unik</small>
        </div>
        <div class="form-group">
          <label for="user_address">Alamat</label>
          <textarea name="user_address" class="form-control" id="user_address" placeholder="Alamat" required></textarea>
          <small id="user_address" class="form-text text-muted">Masukan Alamat</small>
        </div>
        <div class="form-group">
          <label for="user_city">Kota</label>
          <input type="text" name="user_city" class="form-control" id="user_city" placeholder="Kota" required>
          <small id="user_city" class="form-text text-muted">Masukan Nama Kota</small>
        </div>
        <!-- User Sex -->
        <div class="form-group">
          <label for="user_sex">Jenis Kelamin</label>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="user_sex" id="M" value="M" checked required>
                <label class="form-check-label" for="user_sex">
                  Laki-Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="user_sex" id="F" value="F" required>
                <label class="form-check-label" for="user_sex">
                  Perempuan
                </label>
              </div>
            </div>
          <small id="user_sex" class="form-text text-muted">Pilih Jenis Kelamin</small>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
          </div>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Register</button>
      </form>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
