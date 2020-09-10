<?php
session_start();

require_once('views/header.php');
require_once('views/footer.php');
require_once('controllers/ConducteurController.php');
require_once('controllers/VehiculeController.php');
require_once('controllers/EmpruntController.php');

/*Mes objets*/
$conducteur = new  ConducteurController();
$vehicule = new VehiculeController();
$emprunt = new EmpruntController();

/*Mes actions*/
if (empty($_GET['action'])) {
    /*Si aucune action, on redirige sur la page emprunt*/
    header("Location: " . ROOT . "?action=emprunts");
} else {
    switch (URL[0]) {
        case 'conducteurs':
            $conducteur->ajouterConducteur();
            break;
        case 'creationConducteur':
            $conducteur->creationConducteur();
            break;
        case 'modifierConducteur':
            $conducteur->modifierConducteur();
            break;
        case 'validerModificationConducteur':
            $conducteur->validerModificationConducteur();
            break;
        case 'supprimerConducteur':
            $conducteur->supprimerConducteur();
            break;
        case 'vehicules':
            $vehicule->ajouterVehicule();
            break;
        case 'creationVehicule':
            $vehicule->creationVehicule();
            break;
        case 'emprunts':
            $emprunt->ajouterEmprunt();
            break;
        case 'creationEmprunt':
            $emprunt->creationEmprunt();
            break;
        default:
            echo "Oups page 404 !";
    }
}
?>
