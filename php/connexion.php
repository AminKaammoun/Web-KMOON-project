<?php
require_once("user.php");
$us = new user();

$us->user_email = $_POST['Email'];
$us->user_password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
if ($us->verifyUser($us->user_email) != NULL) {
    session_start();
    $_SESSION['Success'] = $us->verifyUser($us->user_email);
    $id = urlencode($us->verifyUser($us->user_email));
    if ((int)$us->getRoleCnx($id) == 0) {
        header('location:../index.php?id='.$id);
    }else  if ((int)$us->getRoleCnx($id) == 1){
        header('location: listProduitAdmin.php?id='.$id);
    }
    
} else {
    session_start();
    $_SESSION['Error'] = 'email ou mot de passe incorrect.';
    header('location:../login.php');
}


?>