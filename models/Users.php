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
        //    je me connecte à la db à l'aide de la méthode heritée connectDb
        $db = $this->connectDb();
        // je stock ma requete sql dans une variable 
        $requete = "SELECT * FROM `pro_users`";
        // j'execute ma requete à l'aide de la méthode query que je stock dans result
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
    }

    // fonction pour verifier si le  est deja existant
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

    // fonction pour verifier si le pseudo est deja existant
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
    public function getOneUser($id)
    {
        $db = $this->connectDb();
        $query = "SELECT `user_id`,`user_pseudo`,`user_firstname`,`user_lastname`,`user_mail` FROM `pro_users` WHERE `user_id` = :id";
        $requete = $db->prepare($query);
        $requete->bindValue(":id", $id, PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch();
    }
    // pour recuperer le speudo du user pour la connexion
    public function getUser($pseudo)
    {
        $db = $this->connectDb();
        $query = "SELECT user_id AS 'id',user_pseudo AS 'pseudo',user_firstname AS 'prénom',user_lastname AS 'nom',user_mail AS 'mail',user_validate AS 'validation',role_id AS 'role' FROM `pro_users` WHERE `user_pseudo` = :pseudo";
        $requete = $db->prepare($query);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
    public function modifyUser($pseudo, $prenom, $nom, $mail, $id)
    {
        $db = $this->connectDb();
        $query = 'UPDATE `pro_users` 
     SET `user_pseudo` = :pseudo, `user_firstname` = :firstname, `user_lastname` = :lastname, `user_mail` = :mail  
        WHERE  `user_id`= :id';
        $requete = $db->prepare($query);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->bindValue(":firstname", $prenom, PDO::PARAM_STR);
        $requete->bindValue(":lastname", $nom, PDO::PARAM_STR);
        $requete->bindValue(":mail", $mail, PDO::PARAM_STR);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        return $requete->execute();
    }

    public function verifUserExist(string $pseudo)
    {
        $db = $this->connectDb();
        // count permet de retourner 1 ou 0 - 1 l'user exist et 0 il n'existe pas 
        $query = "SELECT COUNT(`user_pseudo`) AS utilisateur FROM `pro_users`
WHERE `user_pseudo` = :pseudo";
        $requete = $db->prepare($query);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch();
    }

    public function verifPassword(string $pseudo)
    {
        $db = $this->connectDb();
        $query = "SELECT user_password FROM pro_users
WHERE user_pseudo = :pseudo";
        $requete = $db->prepare($query);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->execute();
        return $requete->fetch();
    }

    public function insertSettingUser($pseudo, $mail, $id)
    {
        $db = $this->connectDb();
        $query = "UPDATE `pro_users`
        SET `user_pseudo` =:pseudo, `user_mail` =:mail
        WHERE `user_id` = :id";
        $requete = $db->prepare($query);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->bindValue(":mail", $mail, PDO::PARAM_STR);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        return $requete->execute();
    }

    public function changeStatusUser($iduser, $userstatus)
    {
        $db = $this->connectDb();
        $query = "UPDATE `pro_users` 
        SET `user_validate` = :userstatus
           WHERE  `user_id`= :iduser;";
        $requete = $db->prepare($query);
        $requete->bindValue(":userstatus", $userstatus, PDO::PARAM_INT);
        $requete->bindValue(":iduser", $iduser, PDO::PARAM_INT);
        return $requete->execute();
    }
}
