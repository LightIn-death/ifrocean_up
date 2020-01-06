<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

if (isset($_POST["submit"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $commune = filter_input(INPUT_POST, "commune");
    $departement = filter_input(INPUT_POST, "departement");

    addPlage($nom, $commune, $departement);
}

?>
<h1>Ajout Plage </h1>

<form method="post">
    <p><input type="text" name="nom" id="nom"
              placeholder="ex : ville" required></p>
    <p><input type="text" name="commune" id="commune"
              placeholder="ex : ville" required></p>
    <p><input type="text" name="departement" id="departement"
              placeholder="ex : vendée  ou 85" required></p>
    <button type="submit" name="submit">Enregistrer</button>
</form>

<?php
//var_dump($nom, $commune, $departement);
?>

<a href="../pages/pageListe.php">Pages</a>
