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
        $requete = "SELECT `ride_iframe`,`ride_title`,`ride_description`,`ride_kilometre`,`ride_participants`,`ride_hours`,`ride_meeting`,`ride_date`,`ride_validate` FROM `pro_ride` WHERE `ride_validate` = 1";
        $result = $db->query($requete);
        return $result->fetchAll();
    }
}
