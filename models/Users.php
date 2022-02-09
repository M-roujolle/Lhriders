<?php

class Users extends DataBase
{
    /**
     * Methode permettant de recuperer tous les users
     * 
     * @return array tableau associatif
     */
    public function getAllUsers()
    {
        //    je me co a la db a l'aide de la methode herité connectDb
        $db = $this->connectDb();
        // je stock ma requete sql sdans une variable 
        $requete = "SELECT * FROM `pro_users`";
        // j'execute ma requete à l'aide de la methode query que je stock dans result
        $result = $db->query($requete);
        // j'effectue un fetchAll pour récupérer les données sous forme de tableau
        return $result->fetchAll();
    }
}

class Rides extends DataBase
{
    public function showRide()
    {
        $db = $this->connectDb();
        $requete = "SELECT * FROM pro_ride";
        $result = $db->query($requete);
        return $result->fetchAll();
    }
}
