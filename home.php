 <?php
session_start();

require 'classes/CategoryService.php';
require 'classes/ProductService.php';
$productService = new ProductService();
$categoryService = new CategoryService();


if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}


if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}

if (isset($_POST['logout'])) {
	session_destroy();
	header("Location: index.php");
}

if (isset($_POST['add'])) {
  $productId = $_POST['product_id'];
  $productService->add($productId);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="vh-100">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">Fast Food Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav container-fluid">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Főoldal <span class="sr-only">(current)</span></a>
      </li>
      <li>
        <a class="nav-link" href="cart.php">Kosár</a>
      </li>
      <div class="ml-auto row">
      	<div class="my-auto mr-3 text-center text-white" ><?php echo $_SESSION['username'];?></div>
      	<form method="POST" action="" class="form-inline ">
        	<input type="submit" name="logout" value="Kijelentkezés" class="btn bg-white">	
        </form>
      </div>
    </ul>
  </div>
</nav>
  <div class="row bg2">
    <div class="col-2 text-light opacity">
     <div class="m-4">
     <h3><u>Kategóriák:</u></h3>
      <ul>
      <li> <a href="home.php">Minden Termék</a></li>
        <?php     
        foreach ($categoryService->getCategories() as $row ){
          echo '<li> <a href="home.php?category='.$row['id'].'">'.$row['name'].'</a></li>';
        }              
        ?>
      </ul>
      
     </div>  
    </div>
 
    <div class="col-10 row justify-content-around">
     <?php 
    if (isset($_GET['category'])){
      $catId = $_GET['category'];
      $products = $productService->getProductsByCatId($catId);
    } else {
        $products = $productService->getProducts();
    }
      foreach ($products as $row) {?>
        <div class="card col-3 my-1 mx-2">
          <div class="card-body">
            <h5 class="card-title text-center"><?php echo $row['name'];?></h5>
            <div class="card-text text-center row ">
                <img class="img-fluid m-auto" height="300" width="300" src="<?php echo $row['image'];?>" />
                <span class="d-block col-6 "><b>Raktáron:</b> <?php echo $row['db'];?> db</span>
                <span class="d-block col-6 "><b> Ár: </b><?php echo $row['price']?> Ft</span>
                
                <?php if($row['db'] > 0) {?>

                <form method="POST" action="" class="form-group col-6 m-auto ">
                  <input class="d-none" type="text" name="product_id" value="<?php echo $row['id'];?>">
                  <input class="btn btn-block btn-dark" type="submit" name="add" value="Kosárba">
                </form>

              <?php } else { ?>
                <button class="btn btn-block btn-dark disabled" disabled type="button">Kosárba</button>
              <?php } ?>

            </div>
          </div>
        </div>
      <?php
        }
      ?>
    </div>
  </div> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>