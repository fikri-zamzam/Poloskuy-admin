<?php
session_start();
$_SESSION["status"] = "sukses";
header("Location: SysLogin.php");

?>