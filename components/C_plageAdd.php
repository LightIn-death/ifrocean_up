<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");

if (isset($_POST["submit"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $commune = filter_input(INPUT_POST, "commune");
    $departement = filter_input(INPUT_POST, "departement");

    addPlage($nom, $commune, $departement);
    alert("La plage a bien ete ajouté");
}

?>
<h1>Ajout Plage </h1>
<div class="zone">
    <form method="post">
        <label for="nom">Nom de la plage</label><input type="text" name="nom" id="nom"
                                                       placeholder="ex : plage de kerzine" required>
        <label for="commune">Nom de la Ville</label><input type="text" name="commune" id="commune"
                                                           placeholder="ex : Lorient" required>
        <label for="departement">Département</label><input type="text" name="departement" id="departement"
                                                           placeholder="ex : vendée  ou 85" required>
        <button type="submit" name="submit">Enregistrer</button>
    </form>

</div>
<?php
//var_dump($nom, $commune, $departement);
?>

<a href="../pages/plageListe.php">Plages</a>
