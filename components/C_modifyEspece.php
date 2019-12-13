<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

modifyEspeces($id_especes);

$id_especes = filter_input(INPUT_GET, "id_especes");

    if(count($id_especes)!=1){
        http_response_code(404);
        die();
    }
?>

<form method="post" action="../includes/DB/selectFunctions.php" >
    <input type="hidden" name="id_especes" value="<?php echo $id_especes?>">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" maxlength="50"
               name="titre" value="<?php echo $result["0"]["titre"] ?>"
               placeholder="titre..." required>
    </div>
</form>

<?php

header('location: ../pages/especeListe');
?>