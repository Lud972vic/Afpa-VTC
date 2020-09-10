<div class="container mb-5">
    <br>
    <h1 class="text-center">Gestion des véhicules</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Marque</th>
            <th scope="col">Modele</th>
            <th scope="col">Couleur</th>
            <th scope="col">Immatriculation</th>
            <th scope="col">Modification</th>
            <th scope="col">Suppression</th>
        </tr>
        </thead>
        <tbody>

        <p class="text-center">
            <img src="ressources/image/vtc.jpg">
        </p>

        <?php
        foreach ($affichage as $vehicule) {
            echo "<tr>";
            echo "<th scope='row'>" . $vehicule['idVehicule'] . "</th>";
            echo "<td>" . $vehicule['Marque'] . "</td>";
            echo "<td>" . $vehicule['Modele'] . "</td>";
            echo "<td>" . $vehicule['Couleur'] . "</td>";
            echo "<td>" . $vehicule['Immatriculation'] . "</td>";
            echo "<td><a href='#' class='btn btn-sm btn-outline-success'><i class='fas fa-edit'></i> Modification</a></td>";
            echo "<td><a href='#' class='btn btn-sm btn-outline-danger'><i class='fas fa-trash-alt'></i> Supprimer</a></td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h3>Ajout un nouveau véhicule</h3>
    <form method="post" action=<?= ROOT . '/?action=creationVehicule'; ?> class="mb-3">
        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque" placeholder="Saissir la marque...">
        </div>
        <div class="form-group">
            <label for="modele">Modele</label>
            <input type="text" class="form-control" id="modele" name="modele" placeholder="Saissir le modèle...">
        </div>
        <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" class="form-control" id="couleur" name="couleur" placeholder="Saissir la couleur...">
        </div>
        <div class="form-group">
            <label for="immatriculation">Immatriculation</label>
            <input type="text" class="form-control" id="immatriculation" name="immatriculation"
                   placeholder="Saissir l'immatriculation...">
        </div>

        <button type="submit" class="btn btn-outline-dark" name="submit">Ajouter le véhicule</button>
    </form>
</div>
