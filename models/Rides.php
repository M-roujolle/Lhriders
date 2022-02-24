<?php

class Rides extends DataBase
{
    /**
     * Méthode permettant de créer une balade 
     * 
     * @param string $iframe: iframe google map
     * @param string $titre:
     * @param string $description: 
     * @param string $kilometre: 
     * @param string $participants: 
     * @param string $hours: 
     * @param string $meeting:
     * @param string $date: 
     * @param int $iduser: il s'agit de l'id du user conecté
     */
    public function insertRide(string $iframe, string $titre, string $description, string $kilometre, string $participants, string $hours, string $meeting, string $date, int $iduser)
    {
        $db = $this->connectDb();
        $requete = "INSERT INTO pro_ride (`ride_iframe`,`ride_title`,`ride_description`,`ride_kilometre`,`ride_participants`,`ride_hours`,`ride_meeting`,`ride_date`,`ride_validate`,`user_id`) 
        VALUES (:iframe, :title, :description, :kilometre, :participants, :hours, :meeting, :date, :validate, :id)";
        $requete = $db->prepare($requete);
        $requete->bindValue(":iframe", $iframe, PDO::PARAM_STR);
        $requete->bindValue(":title", $titre, PDO::PARAM_STR);
        $requete->bindValue(":description", $description, PDO::PARAM_STR);
        $requete->bindValue(":kilometre", $kilometre, PDO::PARAM_STR);
        $requete->bindValue(":participants", $participants, PDO::PARAM_STR);
        $requete->bindValue(":hours", $hours, PDO::PARAM_STR);
        $requete->bindValue(":meeting", $meeting, PDO::PARAM_STR);
        $requete->bindValue(":date", $date, PDO::PARAM_STR);
        $requete->bindValue(":validate", 0, PDO::PARAM_INT);
        $requete->bindValue(":id", $iduser, PDO::PARAM_STR);

        return $requete->execute();
    }

    public function showRide()
    {
        $db = $this->connectDb();
        $requete = "SELECT `ride_id`,`ride_iframe`,`ride_title`,`ride_description`,`ride_kilometre`,`ride_participants`,`ride_hours`,`ride_meeting`,`ride_date`,`ride_validate` FROM `pro_ride` WHERE `ride_validate` = 1";
        $result = $db->query($requete);
        return $result->fetchAll();
    }

    public function getOneRide($id)
    {
        $db = $this->connectDb();
        $requete = "SELECT * FROM `pro_ride` WHERE `ride_id`=:id";
        $insert = $db->prepare($requete);
        $insert->bindValue(":id", $id, PDO::PARAM_STR);
        $insert->execute();
        return $insert->fetch();
    }

    public function deleteRide($id)
    {
        $db = $this->connectDb();
        $query = "DELETE FROM `pro_ride` WHERE `ride_id` = :id";
        $requete = $db->prepare($query);
        $requete->bindValue(":id", $id, PDO::PARAM_INT);
        return $requete->execute();
    }

    public function changeStatusRide($idride, $ridestatus)
    {
        $db = $this->connectDb();
        $query = "UPDATE `pro_ride` 
        SET `ride_validate` = :ridestatus
           WHERE  `ride_id`= :idride;";
        $requete = $db->prepare($query);
        $requete->bindValue(":ridestatus", $ridestatus, PDO::PARAM_INT);
        $requete->bindValue(":idride", $idride, PDO::PARAM_INT);
        return $requete->execute();
    }






    // EN COURS DE TEST-----------------------------------------------------
    public function getAllRides()
    {
        //    je me co a la db a l'aide de la methode herité connectDb
        $db = $this->connectDb();
        // je stock ma requete sql sdans une variable 
        $requete = "SELECT *
        FROM pro_users
        INNER JOIN pro_ride ON pro_users.user_id = pro_ride.user_id;";
        // j'execute ma requete à l'aide de la methode query que je stock dans result
        $result = $db->query($requete);
        // j'effectue un fetchAll pour récupérer les données sous forme de tableau
        return $result->fetchAll();
    }
}
