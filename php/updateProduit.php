<?php
require_once('produit.php');
$pd = new produit();
if (isset($_POST['submit'])) {
    $pd->produit_name = $_POST['name'];
    $pd->produit_desc = $_POST['desc'];
    $pd->produit_prix = $_POST['prix'];
    $pd->produit_stock = $_POST['stock'];
    $pd->produit_marque = $_POST['marque'];
    $pd->produit_type = $_POST['type'];
    if($_FILES['image']['name'] != NULL){
        $pd->produit_img = $_FILES['image']['name'];
    }else{
        $pd->produit_img = $pd->getImage($_GET['id']);
    }
    
    $pd->modifyProduit($_GET['id']);
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/produit/$pd->produit_img");
}
header('location:listProduitAdmin.php');
