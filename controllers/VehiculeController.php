<?php

require_once('models/Vehicule.php');

class VehiculeController
{
    public function ajouterVehicule()
    {
        $this->afficherVehicules();
        require_once('views/vehicule.php');
    }

    public function creationVehicule()
    {
        if (isset($_POST['submit'])) {
            $vehicule = new Vehicule();

            $vehicule->setMarque($_POST['marque']);
            $vehicule->setModele($_POST['modele']);
            $vehicule->setCouleur($_POST['couleur']);
            $vehicule->setImmatriculation($_POST['immatriculation']);

            $marque = $vehicule->getMarque();
            $modele = $vehicule->getModele();
            $couleur = $vehicule->getCouleur();
            $immatriculation = $vehicule->getImmatriculation();

            $vehicule->insert($marque, $modele, $couleur, $immatriculation);
        }
    }

    public function afficherVehicules()
    {
        $vehicule = new Vehicule();
        $affichage = $vehicule->select();

        require_once('views/vehicule.php');
    }
}
