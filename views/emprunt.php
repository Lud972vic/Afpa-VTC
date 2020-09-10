<div class="container  mb-5">
    <br>
    <h1 class="text-center">Gestion des emprunts</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Marque</th>
            <th scope="col">Modele</th>
            <th scope="col">Couleur</th>
            <th scope="col">Immatriculation</th>
            <th scope="col">Date</th>
            <th scope="col">Modification</th>
            <th scope="col">Suppression</th>
        </tr>
        </thead>
        <tbody>

        <p class="text-center">
            <img src="ressources/image/mains.jfif" class="rounded">
        </p>

        <?php
        //var_dump($affichage);die();

        foreach ($resultat as $data) {
            echo "<tr>";
            echo "<th scope='row'>" . $data['idAssociation'] . "</th>";
            echo "<th scope='row'>" . $data['Prenom'] . "</th>";
            echo "<td>" . $data['Nom'] . "</td>";
            echo "<td>" . $data['Marque'] . "</td>";
            echo "<td>" . $data['Modele'] . "</td>";
            echo "<td>" . $data['Couleur'] . "</td>";
            echo "<td>" . $data['Immatriculation'] . "</td>";
            echo "<td>" . $data['DateAssociation'] . "</td>";
            echo "<td><a href='#' class='btn btn-sm btn-outline-success'><i class='fas fa-edit'></i> Modification</a></td>";
            echo "<td><a href='#' class='btn btn-sm btn-outline-danger'><i class='fas fa-trash-alt'></i> Supprimer</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h3>Ajout un nouvel emprunt</h3>
    <form method="post" action=<?= ROOT . '/?action=creationEmprunt'; ?> class="mb-5">

        <h6>Choisir un conducteur</h6>
        <select class="form-control form-control-sm mb-2" name="idConducteur">
            <option class="text-danger">Choisir le conducteur :</option>
            <?php
            foreach ($affichageConducteur as $conducteur) {
                echo "<option value='" . $conducteur['idConducteur'] . "'>" . $conducteur['Nom'] . ' ' . $conducteur['Prenom'] . "</option>";
            }
            ?>
        </select>

        <h6>Choisir un véhicule</h6>
        <select class="form-control form-control-sm mb-4" name="idVehicule">
            <option class="text-danger">Choisir le véhicule :</option>
            <?php
            foreach ($affichageVehicule as $vehicule) {
                echo "<option value='" . $vehicule['idVehicule'] . "'>" . $vehicule['Marque'] . ' ' . $vehicule['Modele'] . ' ' . $vehicule['Couleur'] . ' ' . $vehicule['Immatriculation'] . "</option>";
            }
            ?>
        </select>
        <button type="submit" class="btn btn-outline-dark" name="submit">Ajouter l'emprunt</button>
    </form>

    <h3>Les statistiques : </h3>
    <button type="button" class="btn btn-primary m-1">
        Nombre de conducteur <span class="badge badge-light"><?= $nombreConducteur['Total'] ?></span>
    </button>
    <button type="button" class="btn btn-primary m-1">
        Nombre de véhicule <span class="badge badge-light"><?= $nombreVehicule['Total'] ?></span>
    </button>
    <button type="button" class="btn btn-primary m-1">
        Nombre d’association <span class="badge badge-light"><?= $nombreAssociation['Total'] ?></span>
    </button>
    <button type="button" class="btn btn-warning m-1">
        Les vehicules n’ayant pas de conducteur <span
                class="badge badge-light"><?= $vehiculesSansConducteur['Total'] ?></span>
    </button>
    <button type="button" class="btn btn-warning m-1">
        Les conducteurs n’ayant pas de vehicule <span
                class="badge badge-light"><?= $conducteurSansVehicules['Total'] ?></span>
    </button>
</div>
