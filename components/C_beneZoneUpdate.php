<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_zone = filter_input(INPUT_GET, "z");
$n = filter_input(INPUT_GET, "n");
$data = getZonedetails($id_zone);
$p = getPlageInstance($data["FK_instance_plages"])[0]["id_instancePlages"];

if (isset($_POST["save"])) {
    $number = filter_input(INPUT_POST, "Nombre");
    $Point1 = filter_input(INPUT_POST, "point1");
    $Point2 = filter_input(INPUT_POST, "point2");
    $Point3 = filter_input(INPUT_POST, "point3");
    $Point4 = filter_input(INPUT_POST, "point4");
    if ($Point1 == "") {
        $Point1 = null;
    }
    if ($Point2 == "") {
        $Point2 = null;
    }
    if ($Point3 == "") {
        $Point3 = null;
    }
    if ($Point4 == "") {
        $Point4 = null;
    }
    updateZone($number, $Point1, $Point2, $Point3, $Point4, $id_zone);
    $data = getZonedetails($id_zone);
    updatePlageZoneReshe($p);


}


$data = getZonedetails($id_zone);
$plageName = getPlageInstance($data["FK_instance_plages"])[0]["nom"];



?>
<h1>Details de la zone n° <?php echo $n; ?> </h1>
<h2>plage associer : <b><?php echo $plageName; ?></b></h2>


<form method="post">


    <label for="Nombre">Nombre de personnes
        <input type="number" name="Nombre"
               value="<?php echo $data["nombrePersonne"] ?>" required>
    </label>


    <label for="point1">Point1
        <input type="text" name="point1" value="<?php echo $data["point1"] ?>">
    </label>

    <label for="point2">Point2
        <input type="text" name="point2" value="<?php echo $data["point2"] ?>">
    </label>

    <label for="point3">Point3
        <input type="text" name="point3" value="<?php echo $data["point3"] ?>">
    </label>

    <label for="point4">Point4
        <input type="text" name="point4" value="<?php echo $data["point4"] ?>">
    </label>


    <button type="submit" name="save">Enregistrer</button>
</form>


<a href="/pages/beneEtudes.php">Retour</a>