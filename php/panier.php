<?php
class panier
{
    public $panier_id;
    public $panier_user_id;
    public $panier_produit_name;
    public $panier_quantity;
    public $panier_prix;


    function listPanier($id)
    {
        require_once('server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function ajouterPanier($user_id, $produit_name, $quantity, $produit_price)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $req = "insert into panier (user_id,produit_name,quantity,prix) values ('$user_id','$produit_name','$quantity',$produit_price)";

        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function removePanier($id)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("DELETE FROM panier WHERE id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }
    function removeOnePanier($id)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("DELETE FROM panier WHERE user_id = :id Limit 1");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    function emptyPanier($id)
    {
        require_once('server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("DELETE FROM panier WHERE user_id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    function rowsNumber($id)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $num = $stmt->rowCount();
        return $num;
    }

    function getProductName($id)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return $result['produit_name'];
    }

    function getProductQuantity($id)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        return (int)$result['quantity'];
    }

    function getProudctPrice($id)
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("SELECT * FROM panier WHERE user_id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $price = (int)$result['quantity'] * (int)$result['prix'];
        return $price;
    }
}
