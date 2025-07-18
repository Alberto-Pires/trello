<?php

namespace App;

class Connection
{

	public static function getDb()
	{
		try {

			$conn = new \PDO(
				"mysql:host=localhost;dbname=mydb;charset=utf8",
				"user",
				"password"
			);

			return $conn;
			
		} catch (\PDOException $e) {
			return "Error to connect to database";
		}
	}
}
