<?php 
session_start();
$_SESSION['oturum'] = false;
unset($_SESSION['oturum']);
session_destroy();
header("Location:index.php");
?>
