<?php
session_start();
$_SESSION["login"] = $_POST['user'];
$_SESSION["password"] = $_POST['pwd'];
header("location: ../admin.php");
?>