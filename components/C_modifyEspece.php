<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_especes = filter_input(INPUT_GET, "id_especes");
$nom = filter_input(INPUT_GET, "nom");

$result = selectModifyEspeces($id_especes, $nom);

if (isset($_POST["updateEspeces"])){

    $nom = filter_input(INPUT_POST, "nom");

    modifyEspeces($id_especes ,$nom);
}

?>

    <form method="post">
        <input type="hidden" name="id_especes" >
        <div class="form-group">
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="nom" value="<?php echo $result[0]["nom"] ?>">
        </div>
        <button type="submit" name="updateEspeces">Register</button>
    </form>


    <a href="C_especeListe.php">retour</a>
<?php

