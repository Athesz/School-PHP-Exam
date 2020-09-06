<?php
require_once 'SQL.php';

class CategoryService
{
	private $sql;

	function __construct(){
		$this->sql = new SQL();
	}
    public function getCategories(){
        return $this->sql->getCategories();
    }

}
?>