<?php session_start(); ?>
<?php 
$_SESSION['username'] = null;
$_SESSION['password'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['id'] = null;
$_SESSION['role'] = null;

header("location: ../index.php");

?>