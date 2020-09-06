<?php
require_once 'SQL.php';

class ProductService
{
	private $sql;

	function __construct(){
		$this->sql = new SQL();
	}

	public function getProducts() {
		return $this->sql->getProducts();
	}

	public function add($productId) {
		$count = $this->sql->getDb($productId)[0]['db'];
		if ($count > 0) {
			if (!isset($_SESSION['cart'][$productId])) {
			    $_SESSION['cart'][$productId] = 0;
			}
			$this->sql->decreaseCount($productId);
			$_SESSION['cart'][$productId] += 1;
		}
	}

	public function getProduct($productId) {
		return $this->sql->getProduct($productId);
	}

	public function getProductsByCatId($catId){
		return $this->sql->getProductsByCatId($catId);
	}

}
?>