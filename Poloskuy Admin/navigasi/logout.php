<?php
session_start();
// unset($_SESSION['nik']);
// unset($_SESSION['user']);
// unset($_SESSION['level']);
if(session_destroy()){
    header('Location: login.php');
}

?>