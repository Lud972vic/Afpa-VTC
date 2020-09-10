<?php

require_once('models/Emprunt.php');
require_once('models/Vehicule.php');
require_once('models/Conducteur.php');

class EmpruntController
{
    public function ajouterEmprunt()
    {
        $this->afficherEmprunts();
        require_once('views/emprunt.php');
    }

    public function creationEmprunt()
    {
        if (isset($_POST['submit'])) {
            $emprunt = new Emprunt();

            $emprunt->setIdConducteur($_POST['idConducteur']);
            $emprunt->setIdVehicule($_POST['idVehicule']);

            $idConducteur = $emprunt->getIdConducteur();
            $idVehicule = $emprunt->getIdVehicule();

            $emprunt->insert($idConducteur, $idVehicule);
        }
    }

    public function afficherEmprunts()
    {
        $conducteur = new Conducteur();
        $affichageConducteur = $conducteur->select();

        $vehicule = new Vehicule();
        $affichageVehicule = $vehicule->select();

        $emprunt = new Emprunt();
        $resultat = $emprunt->select();
        $nombreConducteur = $emprunt->nombreVehiculeOuConducteur('conducteur');
        $nombreVehicule = $emprunt->nombreVehiculeOuConducteur('vehicule');
        $nombreAssociation = $emprunt->nombreAssociation();
        $vehiculesSansConducteur = $emprunt->vehiculesSansConducteur();
        $conducteurSansVehicules = $emprunt->conducteurSansVehicules();

        require_once('views/emprunt.php');
    }
}
