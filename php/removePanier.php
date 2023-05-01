<?php 

require_once('panier.php');
$pan = new panier();

$pan->removePanier($_GET['id']);
$id = urldecode($_GET["user_id"]);

header("Location: ../panierList.php?id=$id");
?>