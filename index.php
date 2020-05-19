<?php include 'header.php'; ?>
<?php $uo = new UserOps(); ?>

<?php session_start(); if(!isset($_SESSION['oturum'])) { ?>

<form method="POST">
	<input type="text" name="ad">
	<input type="password" name="sifre">
	<button name="giris" type="submit">giriş yap</button>
</form>

<?php } else { ?>

Hoş geldiniz <?php echo $_SESSION['isim']; ?>.
Çıkış yapmak için <a href="logout.php">tıklayın</a>.

<?php } ?>

<?php 

if(isset($_POST['giris']))
{
	$nick = $_POST['ad'];
	$sifre = $_POST['sifre'];

	if($uo->checkExistance($nick, $sifre))
	{
		$uo->logIn($nick, $sifre);
		echo '<script>alert("Giriş yaptın, yönleniriliyorsun.")</script>';
		echo '<meta http-equiv="refresh" content="1">';
	}
	else
	{
		echo 'böyle bir hesap yok, lütfen önce kayıt olun';
		exit;
	}
}

 ?>

<?php include 'footer.php'; ?>