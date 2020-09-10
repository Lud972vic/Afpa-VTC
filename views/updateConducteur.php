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

    <h3>Modifier conducteur</h3>
    <form method="post" action=<?= ROOT . '/?action=validerModificationConducteur'; ?>>
        <input type="text" class="form-control" id="idConducteur" name="idConducteur" hidden
               value="<?= $idConducteur ?>">

        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $prenom ?>">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $nom ?>">
        </div>

        <button type="submit" class="btn btn-outline-warning mb-5" name="submit">Modifier le conducteur</button>
    </form>
</div>


