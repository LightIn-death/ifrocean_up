<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_zone = filter_input(INPUT_GET, "z");
$number = filter_input(INPUT_GET, "n");
$data = getZonedetails($id_zone);
$plageName = getPlageInstance($data["FK_instance_plages"])[0]["nom"];

var_dump($data);
?>
<h1>Details de la zone n° <?php echo $number; ?> </h1>
<h2>plage associer : <b><?php echo $plageName; ?></b></h2>


<form method="post">


    <label for="Nombre">Nombre de personnes
        <input type="number" name="Nombre"
               value="<?php echo $data["nombrePersonne"] ?>" required>
    </label>


    <label for="point1">Point1
        <input type="text" name="point1" value="<?php echo $data["point1"] ?>">
    </label>

    <label for="point1">Point2
        <input type="text" name="point2" value="<?php echo $data["point2"] ?>">
    </label>

    <label for="point1">Point3
        <input type="text" name="Point3" value="<?php echo $data["point3"] ?>">
    </label>

    <label for="point1">Point4
        <input type="text" name="Point4" value="<?php echo $data["point4"] ?>">
    </label>


    <a href="index.php">
        Retour
    </a>
    <button type="submit">Enregistrer</button>
</form>