<?php


class Database
{
	public static function getConnection($host,$dbname,$user,$password) {
		return new PDO('mysql:host='.$host.";dbname=".$dbname,$user,$password);
	}
}
?>