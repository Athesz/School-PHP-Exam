<?php
require_once 'SQL.php';


class UserService
{
	private $sql;
	function __construct()
	{
		$this->sql = new SQL();
	}

	private function isUserExist($username) {
		return count($this->sql->isUserExist($username)) > 0;
	}

	public function register($username,$password) {
		if ($this->isUserExist($username)) {
			return "Ez az email cím már foglalt";
		}
		$this->sql->addUser($username,hash("sha256", $password));
	}

	public function login($username,$password) {
		$users = $this->sql->getUser($username,hash("sha256", $password));
		if (count($users) != 1) {
			return "Hibás adatok!";
		}
		$_SESSION['username'] = $users[0]['username'];
		header("Location: home.php");
	}
}
?>