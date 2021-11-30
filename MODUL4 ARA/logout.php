<?php
session_start();

setcookie("email", "", 0, "/");
header('location: login.php');
?>