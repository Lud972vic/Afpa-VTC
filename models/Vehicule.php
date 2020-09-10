<?php

require_once('Model.php');

class Vehicule extends Model
{
    private $idVehicule;
    private $marque;
    private $modele;
    private $couleur;
    private $immatriculation;

    /**
     * @return mixed
     */
    public function getIdVehicule()
    {
        return $this->idVehicule;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @param mixed $couleur
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }

    /**
     * @return mixed
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * @param mixed $immatriculation
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
    }

    public function insert($marque, $modele, $couleur, $immatriculation)
    {
        $sql = "INSERT INTO vehicule (marque, modele,couleur,immatriculation) VALUES ('$marque', '$modele','$couleur','$immatriculation')";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        header('Location: ?action=vehicules');
    }

    public function select()
    {
        $sql = "SELECT * FROM vehicule";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }
}
