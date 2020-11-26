<?php
session_start();
unset($_SESSION['eml']);
session_destroy();
header('location:login.php');
?>