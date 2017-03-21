<?php 

class mysqlPdo{
	private static $_db = null;   

	public function __construct(){}

	public function __clone(){}

	public static function getInstance()
	{
		$pdo = new PDO("mysql:dbname=singcms;host=localhost", "root", "123");
		$structure = new NotORM_Structure_Convention(
			$primary = 'id',  
			$foreign = '%sid',
			$table = '%s',
			$prefix = "cms_"
		); 
		$pdo->query("set names utf8");
		if(self::$_db === null)
		{
			self::$_db = new NotORM($pdo, $structure);
		}
		return self::$_db;
	}
}

?>