<?php 
session_start();
$_SESSION['oturum'] = false;
session_destroy();
header("Location:index.php");
?>