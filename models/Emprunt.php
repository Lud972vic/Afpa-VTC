<?php

require_once('Model.php');

class Emprunt extends Model
{
    private $idConducteur;
    private $idVehicule;

    /**
     * @return mixed
     */
    public function getIdConducteur()
    {
        return $this->idConducteur;
    }

    /**
     * @param mixed $idConducteur
     */
    public function setIdConducteur($idConducteur)
    {
        $this->idConducteur = $idConducteur;
    }

    /**
     * @return mixed
     */
    public function getIdVehicule()
    {
        return $this->idVehicule;
    }

    /**
     * @param mixed $idVehicule
     */
    public function setIdVehicule($idVehicule)
    {
        $this->idVehicule = $idVehicule;
    }

    public function insert($idConducteur, $idVehicule)
    {
        $sql = "INSERT INTO conducteur_vehicule (idConducteur, idVehicule) VALUES ('$idConducteur', '$idVehicule')";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        header('Location: ?action=emprunts');
    }

    public function select()
    {
        $sql = "
            SELECT cv.idAssociation, c.Prenom, c.Nom, v.Marque, v.Modele, v.Couleur, v.Immatriculation, cv.DateAssociation FROM conducteur c
            INNER JOIN conducteur_vehicule cv
            ON c.idConducteur = cv.idConducteur
            INNER JOIN vehicule v
            ON v.idVehicule = cv.idVehicule
        ";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }

    public function nombreVehiculeOuConducteur($table)
    {
        $sql = "
            SELECT COUNT(*) As Total FROM $table;
        ";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $nombreVehiculeOuConducteur = $query->fetch();

        return $nombreVehiculeOuConducteur;
    }

    public function nombreAssociation()
    {
        $sql = "
            SELECT COUNT(*) As Total FROM conducteur c
            INNER JOIN conducteur_vehicule cv
            ON c.idConducteur = cv.idConducteur
            INNER JOIN vehicule v
            ON v.idVehicule = cv.idVehicule
        ";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $nombreAssociation = $query->fetch();

        return $nombreAssociation;
    }

    public function vehiculesSansConducteur()
    {
        $sql = "
            SELECT COUNT(idVehicule) AS Total FROM vehicule
            WHERE idVehicule NOT IN (SELECT DISTINCT idVehicule FROM conducteur_vehicule);
        ";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $vehiculesSansConducteur = $query->fetch();

        return $vehiculesSansConducteur;
    }

    public function conducteurSansVehicules()
    {
        $sql = "
            SELECT COUNT(idConducteur) AS Total FROM conducteur
            WHERE idConducteur NOT IN (SELECT DISTINCT idConducteur FROM conducteur_vehicule);
        ";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $conducteurSansVehicules = $query->fetch();

        return $conducteurSansVehicules;
    }
}
