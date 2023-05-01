<?php

class user
{
    public $user_name;
    public $user_last;
    public $user_role;
    public $user_email;
    public $user_password;

    function insertUser()
    {
        require_once('../server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $req = "insert into user (first_name,last_name,role,email,password) values 
        ('$this->user_name','$this->user_last',0,'$this->user_email','$this->user_password')";

        $pdo->exec($req) or print_r($pdo->errorInfo());
        return $pdo;
    }

    function verifyUser($id)
    {
        require_once('../server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("SELECT * FROM user where email = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result != NULL) {
            return $result['id'];
        }else{
            return NULL;
        }
    }

    function getUserName($id){
        require_once('server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("SELECT * FROM user where id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result != NULL) {
            return $result['first_name'];
        }else{
            return NULL;
        }
    }

    function getUserNameCart($id){
        require_once('../server/connection.php');

        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("SELECT * FROM user where id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result != NULL) {
            return $result['first_name'];
        }else{
            return NULL;
        }
    }

    function getRole($id){
        require_once('server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("SELECT * FROM user where id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['role'];
        
    }

    function getRoleCnx($id){
        require_once('../server/connection.php');
        $cnx = new connexion;
        $pdo = $cnx->cnxDB();
        $stmt = $pdo->prepare("SELECT * FROM user where id = :id");
        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['role'];
        
    }
}
