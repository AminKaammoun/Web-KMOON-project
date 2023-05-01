<?php
require_once('commande.php');
$com = new commande();

if (isset($_POST['submit'])) {
   
    $com->updateStatus($_GET['id'],$_POST['status']);
    
}
header('location:listCommandeAdmin.php');
