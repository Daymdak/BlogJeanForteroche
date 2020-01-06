<?php
namespace JeanForteroche\Blog\Model;

class Manager
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=db5000242416.hosting-data.io;dbname=dbs236738;charset=utf8', 'dbu360802', 'Apotoxine-4869');
		return $db;
	}
}