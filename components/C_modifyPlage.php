<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_plages = filter_input(INPUT_GET, "id_plages");
$nom = filter_input(INPUT_GET, "nom");
$commune = filter_input(INPUT_GET, "commune");
$departement = filter_input(INPUT_GET, "departement");


modifyPlage($id_plages, $nom, $commune, $departement);


?>

    <form method="post" action="../includes/DB/selectFunctions.php" >
        <input type="hidden" name="id_plages" value="<?php echo $id_plages?>">
        <div class="form-group">
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="nom"
                   placeholder="<?php echo $result["0"]["nom"] ?>" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="commune" maxlength="50"
                   name="commune"
                   placeholder="<?php echo $result["0"]["commune"] ?>" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="departement" maxlength="50"
                   name="departement"
                   placeholder="<?php echo $result["0"]["departement"] ?>" required>
        </div>
    </form>

<?php

header('location: ../components/C_plageListe');
?>