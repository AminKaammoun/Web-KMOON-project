<?php
require_once("produit.php");
$pd = new produit();
if (isset($_POST['submit'])) {

    $pd->produit_name = $_POST['Name'];
    $pd->produit_desc = $_POST['Desc'];
    $pd->produit_prix = $_POST['Prix'];
    $pd->produit_stock = $_POST['Stock'];
    $pd->produit_marque = $_POST['Marque'];
    $pd->produit_type = $_POST['Type'];
    $pd->produit_img = $_FILES['image']['name'];
    $pd->insertProduit();
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/produit/$pd->produit_img");
}

header('location:listProduitAdmin.php');
?>