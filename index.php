<?php
	require 'classes/UserService.php';
	session_start();
	
	$error = "";
	$userService = new UserService();
	if (isset($_POST['register'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$error = $userService->register($username,$password);
	}
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$error = $userService->login($username,$password);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Etterem</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body >
<div class="row vh-100 m-auto bg1">
		<form id="form" method="POST" action="" class="rounded border p-4 col-3 m-auto form-group bg-light">
		<h2 class="text-center" >Bejelentkezés:</h2>
			<h5 id="error" class="bg-danger text-center text-light m-auto">
				<?php if($error != ""){echo $error;}?>
			</h5>
			<h5 id="success" class="bg-success text-center text-light m-auto">
				<?php 
					if(isset($_POST['register']) && $error == "") {
						echo "Sikeres regisztráció!";
					}
				?>
			</h5>
			<label>Email cím:</label>
			<input type="email" name="username" class="form-control">
			<label>Jelszó:</label>
			<input type="password" name="password" class="form-control mb-2">
			<div class="col text-center">
			<input  id="registerBtn" type="submit" name="register" value="Regisztráció" class="btn btn-dark">
			<input  id="loginBtn" type="submit" name="login" value="Belépés" class="btn btn-dark">
			</div>
			
		
			
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>