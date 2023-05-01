<?php
class commande
{

    public $nom;
    public $prenom;
    public $date;
    public $country;
    public $region;
    public $adresse;
    public $email;
    public $phone;
    public $prix;
    public $remarque;
    public $quantity;
    public $status;

    function ajouterCommande($id, $produit_name, $quality, $price)
    {

        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $req = "insert into commande (user_id,produit_name,quantity,prenom,nom,date,country,region,adresse,email,phone,prix,status,remarque) values 
    ('$id','$produit_name','$quality','$this->prenom','$this->nom','" . date('Y-m-d') . "','$this->country','$this->region','$this->adresse','$this->email','$this->phone','$price','Confirmé','$this->remarque')";

        $pdo->exec($req) or print_r($pdo->errorInfo());
    }

    function listCommande($id)
    {
        require_once('server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $stmt = $pdo->prepare("SELECT * FROM commande WHERE user_id = :id");

        $stmt->bindParam(':id', $id);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    function listCommandeAdmin()
    {
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();

        $req = "SELECT * FROM commande";

        $res = $pdo->query($req) or print_r($pdo->errorInfo());
        return $res;
    }

    function updateStatus($id,$value){
        require_once('../server/connection.php');
    
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        
        $stmt = $pdo->prepare("UPDATE commande set status = '$value' WHERE id = :id");
        $stmt->bindParam(':id', $id);
    
        $stmt->execute();
    }
}
?>