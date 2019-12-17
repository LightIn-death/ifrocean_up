<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";


$id_zone = filter_input(INPUT_GET, "z");
$number = filter_input(INPUT_GET, "n");
$data = getZonedetails($id_zone);

?>

<h1>Details de la zone n° <?php echo $number; ?> </h1>


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
            echo "<td><td><a href='/pages/beneZoneView.php?z=$zoneId'>Selectioner</a></td></td></tr>";

        }
        ?>

</table>

<a href='/pages/beneEtudes.php'>Retour</a>


