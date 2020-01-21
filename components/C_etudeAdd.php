<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");


if (isset($_POST["nom"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $reference = filter_input(INPUT_POST, "reference");

    EtudeAdd($nom, $reference);
    header('Location: etudeListe.php');

}

?>
<h1>Créer une etude</h1>
<div class="zone">
    <form method="post">


        <label for="Nom">Nom</label>
        <input type="text" id="titre" maxlength="50"
               name="nom"
               placeholder="Nom de L'etude ..." required>


        <label for="reference">référence de l'étude</label>
        <input id="reference"
               name="reference"
               placeholder="reference de l'etude...">

        <button type="submit">Enregistrer</button>
    </form>
</div>
<a href="/pages/etudeListe.php">
    Retour
</a>




