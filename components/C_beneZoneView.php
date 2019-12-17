<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";


$id_zone = filter_input(INPUT_GET, "z");
$number = filter_input(INPUT_GET, "n");
$data = getZonedetails($id_zone);
var_dump($data);

$plageName = getPlageInstance($data["FK_instance_plages"])[0]["nom"];

?>

<h1>Details de la zone n° <?php echo $number; ?> </h1>

<h2>plage associer : <b><?php echo $plageName; ?></b></h2>


<table>
    <tr>
        <th>Point</th>
        <th>Coordonne</th>
        <th>Action</th>

    </tr>
    <tr>
        <td>point 1</td>
        <td><?php echo $data["point1"]; ?></td>
        <td><a href="/pages/beneModifyPoint.php?z=<?php echo $id_zone ?>p=point1">Modifier</a>
        </td>
    </tr>
    <tr>
        <td>point 2</td>
        <td><?php echo $data["point2"]; ?></td>
        <td><a href="/pages/beneModifyPoint.php?z=<?php echo $id_zone ?>p=point2">Modifier</a>
        </td>
    </tr>
    <tr>
        <td>point 3</td>
        <td><?php echo $data["point3"]; ?></td>
        <td><a href="/pages/beneModifyPoint.php?z=<?php echo $id_zone ?>p=point3">Modifier</a>
        </td>
    </tr>
    <tr>
        <td>point 4</td>
        <td><?php echo $data["point4"]; ?></td>
        <td><a href="/pages/beneModifyPoint.php?z=<?php echo $id_zone ?>p=point4">Modifier</a>
        </td>
    </tr>

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


