<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_plages = filter_input(INPUT_GET, "id_plages");
$nom = filter_input(INPUT_GET, "nom");
$commune = filter_input(INPUT_GET, "commune");
$departement = filter_input(INPUT_GET, "departement");

$result = selectModifyPlage($id_plages, $nom, $commune, $departement);

if (isset($_POST["updatePlage"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $commune = filter_input(INPUT_POST, "commune");
    $departement = filter_input(INPUT_POST, "departement");

    modifyPlage($id_plages ,$nom, $commune, $departement);
}

?>

    <form method="post">
        <input type="hidden" name="id_plages" >
        <div class="form-group">
            <input type="text" class="form-control" id="nom" maxlength="50"
                   name="nom" value="<?php echo $result[0]["nom"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="commune" maxlength="50"
                   name="commune" value="<?php echo $result[0]["commune"] ?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="departement" maxlength="50"
                   name="departement" value="<?php echo $result[0]["departement"] ?>">
        </div>
        <button type="submit" name="updatePlage">Register</button>
    </form>

    <a href="C_plageListe.php">retour</a>
<?php
var_dump($id_plages, $nom, $commune, $departement);

