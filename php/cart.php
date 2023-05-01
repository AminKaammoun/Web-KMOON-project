<?php 

require_once("../php/panier.php");
    $pan = new panier();

    require_once("../php/user.php");
    $us = new user();

    require_once('../php/produit.php');
    $pd = new produit();
    session_start();
    if (isset($_SESSION['Success'])) {
         $id = (int)urldecode($_GET["id"]);
        $logged_in_user_id = (int) $_SESSION['Success'];

        if ($logged_in_user_id != $id) {

            header("Location: php/error.php");
            //exit();
        }
        $name = $us->getUserNameCart(urldecode($_GET["id"]));
        
        $produitName = urldecode($_GET["name"]);
        $prix = $pd->getPriceCart($produitName);
        $quantity = $_POST['quantity'];
        $pan->ajouterPanier($id, $produitName,$quantity,$prix);
    } 
    header('location: ../panierList.php?id='.$id);
?>