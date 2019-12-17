<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_especes = filter_input(INPUT_GET, "id_especes");
$nom = filter_input(INPUT_GET, "nom");

$result=modifyOneEspece();

var_dump($id_especes, $nom);
?>

<form method="post" >
    <input type="hidden" name="id_especes" value="<?php echo $id_especes?>">
    <div>
        <label for="nom">Nom especes</label>
        <input type="text" id="nom"
               name="nom" value="<?php echo $result["0"]["nom"] ?>">
    </div>
    <button type="submit">enregistrer</button>
</form>

<?php

?>