<?php
session_start();
$_SESSION['loggedin'] = 'true';
$_SESSION['user'] = $_POST['userid'];
header('Location: index.php');
?>
