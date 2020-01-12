<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

if (isset($_POST["nom"])) {

    $nom = filter_input(INPUT_POST, "nom");

    addEspece($nom);
}

?>
<h1>Ajout Espece </h1>

<form method="post" >
    <input type="text" name="nom" id="nom"
              placeholder="ex : Thon" required>
    <button type="submit">Enregistrer</button>
</form>

<a href="/pages/especeListe.php">Espece</a>

