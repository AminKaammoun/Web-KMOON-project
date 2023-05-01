<?php

class connexion{
    public function cnxDB(){
        $dbc = new PDO('mysql:host=localhost;dbname=KMOON','root',"");
        return $dbc;
    }
}


?>