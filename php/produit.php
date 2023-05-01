<?php

class produit
{

    public $produit_name;
    public $produit_marque;
    public $produit_type;
    public $produit_prix;
    public $produit_desc;
    public $produit_stock;
    public $produit_img;


    function insertProduit()
    {
        require_once('../server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $req = "insert into Produit (name,marque,type,prix,description,stock,img) values ('$this->produit_name','$this->produit_marque','$this->produit_type','$this->produit_prix','$this->produit_desc','$this->produit_stock','$this->produit_img')";
        
        $pdo->exec($req) or print_r($pdo->errorInfo());
       
    }

    function getImage($id){
        require_once('../server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT img FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['img'];
    }

    function getImagePanier($id){
        require_once('server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT img FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['img'];
    }

    function removeProduit($id)
    {
        require_once('../server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("DELETE FROM Produit WHERE name = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    function modifyProduit($id)
    {
        require_once('../server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("UPDATE Produit 
    Set name= '$this->produit_name' , marque ='$this->produit_marque', 
    type ='$this->produit_type', prix ='$this->produit_prix' , 
    description='$this->produit_desc', stock ='$this->produit_stock' , img='$this->produit_img' 
    WHERE name = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    function listProduit()
    {
        require_once('../server/connection.php');
        $cnx = new connexion();
        $pdo = $cnx->cnxDB();
        $req =
            "SELECT * FROM Produit";
        $res = $pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }

    function listProduitShop()
    {
        require_once('server/connection.php');
        $cnx = new connexion();
        $pdo = $cnx->cnxDB();
        $req =
            "SELECT * FROM Produit";
        $res = $pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }

    function getPrice($id){
        require_once('server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT * FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['prix'];
    }

    function getPriceCart($id){
        require_once('../server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT * FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['prix'];
    }

    function getDesc($id){
        require_once('server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT * FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['description'];
    }

    function getQuantity($id){
        require_once('server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT * FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['stock'];
    }
    function getImageDetails($id){
        require_once('server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT img FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['img'];
    }
    function getType($id){
        require_once('server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT * FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['type'];
    }

    function getStock($id){
        require_once('../server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
    
        $stmt = $pdo->prepare("SELECT * FROM Produit WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result['stock'];
    }

    function reduceStock($id,$number){
        require_once('../server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $new_stock = (int)$this->getStock($id) - (int)$number;
        $stmt = $pdo->prepare("UPDATE Produit set stock = '$new_stock' WHERE name = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    
    }

}
