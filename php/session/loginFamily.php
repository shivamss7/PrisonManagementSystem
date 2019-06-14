<?php
session_start();
$_SESSION["login"] = $_POST['name'];
$_SESSION["password"] = $_POST['password'];
header("location: ../family.php");
?>