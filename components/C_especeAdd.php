<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");


if (isset($_POST["nom"])) {

    $nom = filter_input(INPUT_POST, "nom");

    addEspece($nom);
}

?>
<h1>Ajout Espèce </h1>

<form method="post">
    <input type="text" name="nom" id="nom"
           placeholder="ex : Thon" required>
    <button type="submit">Enregistrer</button>
</form>

<a href="/pages/especeListe.php">Espèce</a>

