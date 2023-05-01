<?php
require_once("user.php");
$us = new user();

$us->user_name = $_POST['name'];
$us->user_last = $_POST['last'];
$us->user_email = $_POST['email'];
$us->user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
if ($us->insertUser()) {
    session_start();
    $_SESSION['success'] = 'utilisateur est inscrit avec succès vous pouvez connecter.';
} else {
    session_start();
    $_SESSION['error'] = 'Un erreur est survenue dans votre inscription.';
}

header('location:../login.php');
?>