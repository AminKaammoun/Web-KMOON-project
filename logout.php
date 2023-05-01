<?php
session_start();
unset($_SESSION['Success']);
header("Location: login.php");

?>