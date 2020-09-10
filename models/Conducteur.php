<?php

require_once('Model.php');

class Conducteur extends Model
{
    private $idConducteur;
    private $prenom;
    private $nom;

    /**
     * @return mixed
     */
    public function getIdConducteur()
    {
        return $this->idConducteur;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function insert($prenom, $nom)
    {
        $sql = "INSERT INTO conducteur (prenom, nom) VALUES ('$prenom', '$nom')";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        header('Location: ?action=conducteurs');
    }

    public function select()
    {
        $sql = "SELECT * FROM conducteur";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

        return $resultat;
    }

    public function delete($idConducteur)
    {
        $sql = "DELETE FROM conducteur WHERE idConducteur = $idConducteur ";
        $query = $this->getBdd()->prepare($sql);

        if ($query->execute()) {
            $_SESSION['alert'] = [
                "message" => "Le conducteur est supprimé !",
                "type" => "alert-success"
            ];
        } else {
            $_SESSION['alert'] = [
                "message" => "Le chauffeur est rattaché à une voiture, la suppresion est impossible !",
                "type" => "alert-danger"
            ];
        };

        header('Location: ?action=conducteurs');
    }


    public function update()
    {
        header('Location: ?action=conducteurs');
    }

    public function validationUpdate($prenom, $nom, $idConducteur)
    {
        $sql = "UPDATE conducteur SET nom ='$nom', prenom ='$prenom' WHERE idConducteur = '$idConducteur'";
        $query = $this->getBdd()->prepare($sql);
        $query->execute();

        $_SESSION['alert'] = [
            "message" => "Les informations sont actualisées !",
            "type" => "alert-success"
        ];

        header('Location: ?action=conducteurs');
    }
}
