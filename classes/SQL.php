<?php
require 'Database.php';

class SQL
{
	private $con;
	function __construct()
	{
		$this->con = Database::getConnection("localhost","etterem","root","");
	}


	public function addUser($username,$password) {
		$stm = $this->con->prepare('INSERT INTO users(username,password)VALUES(:username,:password)');
		$stm->bindParam(':username',$username);
		$stm->bindParam(':password',$password);
		$stm->execute();
	}

	public function getUser($username,$password) {
		$stm = $this->con->prepare('SELECT * FROM users WHERE username =:username AND password=:password');
		$stm->bindParam(':username',$username);
		$stm->bindParam(':password',$password);
		$stm->execute();
		return $stm->fetchAll();
	}

	public function isUserExist($username) {
		$stm = $this->con->prepare("SELECT * FROM users WHERE username = :username");
		$stm->bindParam(':username',$username);
		$stm->execute();
		return $stm->fetchAll();
	}


	public function getProducts() {
		return $this->con->query("SELECT * FROM products");
	}

	public function decreaseCount($productId) {
		$stm = $this->con->prepare("UPDATE products SET db = db-1 WHERE id = :id");
		$stm->bindParam(":id",$productId);
		$stm->execute();
	}

	public function getDb($productId) {
		$stm = $this->con->prepare("SELECT db FROM products WHERE id = :id");
		$stm->bindParam(":id",$productId);
		$stm->execute();
		return $stm->fetchAll();
	}

	
	public function getProduct($productId) {
		$stm = $this->con->prepare("SELECT * FROM products WHERE id = :id");
		$stm->bindParam(":id",$productId);
		$stm->execute();
		return $stm->fetchAll();
	}

	public function getCategories(){
		return $this->con->query("SELECT * FROM category");
	}

	public function getProductsByCatId($catId){
		$stm = $this->con->prepare("SELECT * FROM products WHERE products.cat_id = :id");
		$stm->bindParam(":id",$catId);
		$stm->execute();
		return $stm->fetchAll();
	}

}

?>