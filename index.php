<form method="POST">
	<input type="text" required="" name="name">
	<input type="password" required="" name="password">
	<button type="submit">gir</button>
</form>

<?php 

include 'class.php';

$userOperations = new userOperations();

if($_POST)
{
	$name = $_POST['name'];
	$password = $_POST['password'];

	if($userOperations->checkExistance($name, $password))
	{
		$userOperations->logUserIn($name);
		if($userOperations->logUserIn($name))
		{
			echo "başarılı";
		}
		else
		{
			echo "başarısız";
		}
	}
	else
	{
		$userOperations->registerUser($name, $password);

		if($userOperations->registerUser($name, $password))
		{
			echo "başarılı";
		}
		else
		{
			echo "başarısız";
		}
	}
}

 ?>