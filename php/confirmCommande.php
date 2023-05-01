<?php 

require_once('commande.php');
$com = new commande();

require_once('panier.php');
$pan = new panier();

require_once('produit.php');
$pd = new produit();

  $id = urldecode($_GET["id"]);

if (isset($_POST['submit'])) {
  
    $num = $pan->rowsNumber($id);
    $com->nom = $_POST['nom'];
    $com->prenom = $_POST['prenom'];
    $com->country = $_POST['country'];
    $com->region = $_POST['region'];
    $com->adresse = $_POST['adress'];
    $com->email = $_POST['email'];
    $com->phone = $_POST['phone'];
    $com->remarque = $_POST['remarque'];
    for($i = 0; $i < $num ; $i++){
        $quan = $pan->getProductQuantity($id);
       
        $price = $pan->getProudctPrice($id);
        $name = $pan->getProductName($id); 
        $pd->reduceStock($name,$quan);
        $com->ajouterCommande($id,$name,$quan,$price);
        $pan->removeOnePanier($id);

    }
    
    header('location:../panierList.php?id='.$id);
}


?>