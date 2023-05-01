<?php
require_once('produit.php');
$pd=new produit();
$pd->removeProduit($_GET['id']);
header('location:listProduitAdmin.php');

?>