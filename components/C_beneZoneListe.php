<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("B");


$nombrePersonne = filter_input(INPUT_POST, "nombrePersonne");

$id_etude = filter_input(INPUT_GET, "e");
$id_plage = filter_input(INPUT_GET, "p");

$data = getZones($id_plage);


?>

<h1>veuillez Sélectionner une Zone : </h1>

<table>
    <tr>
        <th>Titre</th>
        <th>Selection</th>

    </tr>
    <tr>


        <?php
        $i = 0;
        foreach ($data as $d) {
            $i++;
            $zoneId = $d['id_zones'];
            echo "<td>Zone n°$i</td>";
            echo "<td><a href='/pages/beneZoneView.php?z=$zoneId&n=$i&e=$id_etude&p=$id_plage'>Sélectionner</a></td></tr>";
        }


        ?>
    </tr>
</table>
<?php if (!isset($_POST["createZone"])) {
    ?>
    <form method="post">
        <button type="submit" name="createZone">Ajouter une zone</button>
    </form>
<?php } ?>
<?php
if (isset($_POST["createZone"])) {
    ?>
    <form method="post">
        <p2>Nombre de bénévoles dans cette zone :</p2>
        <input type="text" id="nombrePersonne" name="nombrePersonne" pattern="[1-9]\d*">
        <button name="CreateZone">Créer une Zone</button>
    </form>

    <?php
}
$i++;
if (isset($_POST["nombrePersonne"])) {
    $zoneId = createNewZone($id_plage, $nombrePersonne);
    header("Location: /pages/beneZoneView.php?z=$zoneId&n=$i&e=$id_etude&p=$id_plage");
}
?>

<a href="/pages/beneEtudeView.php?id=<?php echo $id_etude ?>">Retour</a>
