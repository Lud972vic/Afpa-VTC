<div class="container">
    <br>
    <h1 class="text-center">Gestion des conducteurs</h1>

    <?php if (!empty($_SESSION['alert'])): ?>
        <div class="alert text-center <?= $_SESSION['alert']['type'] ?>" role="alert">
            <?= $_SESSION['alert']['message'] ?>
        </div>
        <?php
        /*On supprime le message si on actualise la page ou si on change de page*/
        unset($_SESSION['alert']);
    endif;
    ?>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prenom</th>
            <th scope="col">Nom</th>
            <th scope="col">Modification</th>
            <th scope="col">Suppression</th>
        </tr>
        </thead>
        <tbody>

        <p class="text-center">
            <img src="ressources/image/conducteur.jfif" class="rounded">
        </p>

        <?php

        foreach ($affichage as $conducteur) {
            echo "<tr>";
            echo "<th scope='row'>" . $conducteur['idConducteur'] . "</th>";
            echo "<td>" . $conducteur['Prenom'] . "</td>";
            echo "<td>" . $conducteur['Nom'] . "</td>";
            echo "<td><a href='" . ROOT . "?action=modifierConducteur/" . $conducteur['idConducteur'] . '/' . $conducteur['Prenom'] . '/' . $conducteur['Nom'] . "' class='btn btn-sm btn-outline-warning'><i class='fas fa-edit'></i> Modification</a></td>";
            echo "<td><a class='btn btn-sm btn-outline-danger' data-toggle='modal' data-target='#message_" . $conducteur['idConducteur'] . "'><i class='fas fa-trash-alt'></i> Supprimer</a>
                <div class='modal fade' id='message_" . $conducteur['idConducteur'] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Voulez-vous vraiement supprimer ce chauffeur ?</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                               Chauffeur : " . $conducteur['Nom'] . ' ' . $conducteur['Prenom'] . "
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-outline-dark' data-dismiss='modal'>Non</button>
                                <a href='" . ROOT . "?action=supprimerConducteur/" . $conducteur['idConducteur'] . "'>
                                <button type='button' class='btn btn-outline-danger'>Oui</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h3>Ajout un nouveau conducteur</h3>
    <form method="post" action=<?= ROOT . '/?action=creationConducteur'; ?>>
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Saissir le prénom...">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Saissir le nom...">
        </div>

        <button type="submit" class="btn btn-outline-dark mb-5" name="submit">Ajouter le conducteur</button>
    </form>
</div>


