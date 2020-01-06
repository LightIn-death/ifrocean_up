<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";


if (isset($_POST["nom"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $reference = filter_input(INPUT_POST, "reference");

    EtudeAdd($nom, $reference);
    header('Location: etudeListe.php');

}

?>

<div class="zone">
    <form method="post">


        <label for="Nom">Nom</label>
        <input type="text" id="titre" maxlength="50"
               name="nom"
               placeholder="Nom de L'etude ..." required>


        <label for="reference">reference de l'etude</label>
        <input id="reference"
               name="reference"
               placeholder="reference de l'etude...">

        <button type="submit">Enregistrer</button>
    </form>
</div>
<a href="/pages/etudeListe.php">
    Retour
</a>




