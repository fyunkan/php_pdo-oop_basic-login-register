<?php 

include 'dbConnection.php';

class UserOperations extends dbConnection
{
	public $row;
	public $str;
	public $int;

	public function getID($name)
	{
		$sql = "SELECT * FROM kayitlar WHERE isim=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name]);
		$this->row = $stmt->fetch();
		$this->int = $this->row['sqlid'];
		return $this->int;
	}

	public function getName($id)
	{
		$sql = "SELECT * FROM kayitlar WHERE sqlid=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$this->row = $stmt->fetch();
		$this->str = $this->row['isim'];
		return $this->str;
	}

	public function getRow($id)
	{
		$sql = "SELECT * FROM kayitlar WHERE sqlid=?";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$id]);
		$this->row = $stmt->fetch();	
	}

	public function checkExistance($name, $password)
	{
		$sql = "SELECT * FROM kayitlar WHERE isim=? && sifre=? LIMIT 1";
		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $password]);
		$this->row = $stmt->rowCount();
		if($this->row > 0)
			return true;
		else
			return false;
	}

	public function registerUser($name, $password)
	{
		$sql = "INSERT INTO kayitlar(isim, sifre) VALUES(?, ?)";
		$stmt = $this->connect()->prepare($sql);
		$this->row = $stmt->execute([$name, $password]);
		if($this->row)
			return true;
		else
			return false;
	}

	public function logUserIn($name)
	{
		session_start();
		$_SESSION['oturum'] = true;
		$_SESSION['karakter'] = $name;
		$this->getRow($this->getID($_SESSION['karakter']));
		if($this->row['admin'] > 0)
		{
			$_SESSION['admin'] = true;
		}
	}

}
 ?>