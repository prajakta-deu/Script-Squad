<?php
include "navbar.php";
session_start();
unset($_SESSION['email']);
unset($_SESSION['loggedin']);
header("Location:home.php");
?>