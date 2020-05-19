<?php 

class dbConn
{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $dbnm = 'blog1';

	protected function connect()
	{
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbnm.';charset=utf8';
		$db = new PDO($dsn, $this->user, $this->pass);
		return $db;
	}
}

 ?>