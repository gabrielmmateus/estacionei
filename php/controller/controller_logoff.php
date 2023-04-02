<?php
session_start();
$_SESSION['security'] = false;
header("Location: ../../pages/admin/login.php");

?>