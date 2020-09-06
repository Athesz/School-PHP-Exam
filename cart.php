<?php
require 'classes/ProductService.php';
session_start();
$productService = new ProductService();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}

if(!isset($_SESSION['cart'])) {
  header("Location: home.php");
}

if (isset($_POST['logout'])) {
	session_destroy();
	header("Location: index.php");
}
if (isset($_POST['clear'])) {
  unset($_SESSION['cart']);
  $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kosár Tartalma</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="vh-100 bg2">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">Fast Food Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav container-fluid">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Főoldal</a>
      </li>
      <li>
      	<a class="nav-link" href="cart.php">Kosár</a>
      </li>
      <div class="ml-auto row">
      	<div class="my-auto mr-3 text-center text-white"><?php echo $_SESSION['username'];?></div>
      	<form method="POST" action="" class="form-inline ">
        	<input type="submit" name="logout" value="Kijelentkezés" class="btn bg-white">	
        </form>
      </div>
    </ul>
  </div>
</nav>

<div class="row col-8 m-auto justify-content-around">
  <div class="row col-12 my-3">
  <h2 class="m-auto text-white"> A KOSÁR TARTALMA</h2>
  </div>
   <?php
    if (count($_SESSION['cart']) > 0) {
        $osszesen = 0;
        foreach($_SESSION['cart'] as $id => $count) {
            $product = $productService->getProduct($id)[0]; 
            $osszesen += $product['price'] * $count;
            ?>
            <div class="card col-3  my-1 mx-1">
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo $product['name'];?></h5>
                <div class="card-text text-center row">
                    <img class="img-fluid m-auto block" height="300" width="300" src="<?php echo $product['image'];?>" />
                    <span class="d-block col-6 "><b>Kosárban:</b>  <?php echo $count;?> db</span>
                    <span class="d-block col-6 "><b> Ár: </b><?php echo $product['price']; ?> FT</span>
                  </div>
              </div>
            </div>
            <?php } ?>
            <div class="col-12 bg-white p-3 my-4  rounded"> 
              <h1 class="text-center text-dark">Összesen fizetendő : <?php echo $osszesen;?> FT</h1>
              <form class="text-center" action="" method="POST">
                <input type="submit" name="clear" value="Kosár üritése" class="btn bg-dark text-white">
                <a class="btn bg-dark text-white" href="home.php">Vissza a Boltba!</a>
              </form>
            </div>
    <?php
      } else { ?>
      <h1 class="jumbotron">Jelenleg a kosarad üres látogass el a <a href="home.php">fő oldalra</a> ha vásárolni szeretnél!</h1>
    <?php } ?>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>