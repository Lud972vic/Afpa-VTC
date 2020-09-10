<?php

require_once('models/Conducteur.php');

class ConducteurController
{
    public function ajouterConducteur()
    {
        $this->afficherConducteurs();
        require_once('views/conducteur.php');
    }

    public function creationConducteur()
    {
        if (isset($_POST['submit'])) {
            $conducteur = new Conducteur();

            $conducteur->setPrenom($_POST['prenom']);
            $conducteur->setNom($_POST['nom']);

            $prenom = $conducteur->getPrenom();
            $nom = $conducteur->getNom();

            $conducteur->insert($prenom, $nom);
        }
    }

    public function afficherConducteurs()
    {
        $conducteur = new Conducteur();
        $affichage = $conducteur->select();

        require_once('views/conducteur.php');
    }

    public function supprimerConducteur()
    {
        /*On récupère l'action dans l'URL : ?action=supprimerConducteur/1*/
        $param_url = explode("/", $_GET['action']);

        /*On récupère l'ID*/
        $idConducteur = $param_url[1];

        $conducteur = new Conducteur();
        $conducteur->delete($idConducteur);
    }

    public function modifierConducteur()
    {
        /*On récupère l'action dans l'URL : ?action=supprimerConducteur/1*/
        $param_url = explode("/", $_GET['action']);

        /*On récupère les informations de l'utilisateur*/
        $idConducteur = $param_url[1];
        $nom = $param_url[2];
        $prenom = $param_url[3];

        require_once('views/updateConducteur.php');
    }

    public function validerModificationConducteur()
    {
        /*On récupère les informations de l'utilisateur*/
        $idConducteur = $_POST['idConducteur'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        $conducteur = new Conducteur();
        $conducteur->validationUpdate($prenom, $nom, $idConducteur);

        $_SESSION['alert'] = [
            "message" => "Le conducteur est modifié !",
            "type" => "alert-success"
        ];
    }
}
