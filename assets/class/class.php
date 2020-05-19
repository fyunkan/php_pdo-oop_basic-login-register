<?php 

include 'db.php';

class UserOps extends dbConn
{
	public $row;
	public $str;
	public $int;

	public function checkExistance($name, $pass)
	{
		$sql = "SELECT * FROM kayitlar WHERE isim=? && sifre=? LIMIT 1";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$name, $pass]);
		$this->row = $stmt->rowCount();

		if($this->row > 0)
			return true;
		else
			return false;
	}

	public function logIn($name)
	{
		$_SESSION['oturum'] = true;
		$_SESSION['isim'] = $name;
	}
}

 ?>