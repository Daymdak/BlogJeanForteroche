<?php
namespace JeanForteroche\Blog\Model;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=dbs236738;charset=utf8', 'root', '');
		return $db;
	}
}