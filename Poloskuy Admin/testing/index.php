<?php
session_start();
$_SESSION["status"] = "sukses";
header("location: ../SysLogin.php");

?>