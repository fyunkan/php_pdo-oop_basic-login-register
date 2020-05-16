<?php 

class dbConnection
{
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $dbnm = "database";

	protected function connect()
	{
		$dsn = "mysql:host=".$this->host.";dbname=".$this->dbnm.";charset=utf8";
		$db = new PDO($dsn, $this->user, $this->pass);
	    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    	return $db;
	}
}

 ?>