<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

if (isset($_POST["nom"])) {

    $nom = filter_input(INPUT_POST, "nom");

    addEspece($nom);
}

?>
<h1>Ajout Espece </h1>

<form method="post" >
    <p><input type="text" name="nom" id="nom"
              placeholder="ex : Thon" required></p>
    <button type="submit">Enregistrer</button>
</form>

<a href="/pages/especeListe.php">Espece</a>

