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

    public function insertUser($pseudo, $prenom, $nom, $mail, $motdepasse)
    {
        $db = $this->connectDb();
        $requete = "INSERT INTO `pro_users` (`user_pseudo`,`user_firstname`,`user_lastname`,`user_mail`,`user_password`) VALUES (:pseudo,:firstname,:lastname,:mail,:password)";
        $requete = $db->prepare($requete);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->bindValue(":firstname", $prenom, PDO::PARAM_STR);
        $requete->bindValue(":lastname", $nom, PDO::PARAM_STR);
        $requete->bindValue(":mail", $mail, PDO::PARAM_STR);
        $requete->bindValue(":password", $motdepasse, PDO::PARAM_STR);
        return $requete->execute();

        // modif a voir avec anou ou chef back alex, dans merise, table pro_user (cliquer sur la clé de 10) user_validate et role_id mis par defaut 0 et 2
        // avant, aucun parametre dans la colonne default/Expression
    }

    // fonction pour verifier si le pseudo est deja existant
    public function checkFreeMail(string $mail): bool
    {
        $db = $this->connectDb();
        $query = "SELECT `user_mail` FROM `pro_users` WHERE `user_mail` = :mail";
        $requete = $db->prepare($query);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);
        $requete->execute();
        $result = $requete->fetchAll();

        if (count($result) == 0) {
            return true;
        } else {
            return false;
        }
    }

    // fonction pour verifier si le mail est deja existant
    public function checkFreePseudo(string $pseudo): bool
    {
        $db = $this->connectDb();
        $query = "SELECT `user_mail` FROM `pro_users` WHERE `user_pseudo` = :pseudo";
        $requete = $db->prepare($query);
        $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $requete->execute();
        $result = $requete->fetchAll();

        if (count($result) == 0) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteUser($id)
    {
        $db = $this->connectDb();
        $query = "DELETE FROM `pro_users` WHERE `user_id` = :id";
        $requete = $db->prepare($query);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        return $requete->execute();
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
