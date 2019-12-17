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
        <th>Coordonnes</th>


    </tr>
    <tr>
        <td>point 1</td>
        <td><?php echo $data["point1"]; ?></td>
        </td>
    </tr>
    <tr>
        <td>point 2</td>
        <td><?php echo $data["point2"]; ?></td>
        </td>
    </tr>
    <tr>
        <td>point 3</td>
        <td><?php echo $data["point3"]; ?></td>
        </td>
    </tr>
    <tr>
        <td>point 4</td>
        <td><?php echo $data["point4"]; ?></td>
        </td>
    </tr>
</table>

<h3>Nombre de personne participants dans la zone : <?php echo $data["nombrePersonne"]; ?></h3>
<a href='/pages/beneEtudes.php'>Modifier</a>

<?php
$data = getInstEspece($id_zone);
var_dump($data);

?>


<table>
    <tr>
        <th>Espece</th>
        <th>Nombre</th>
        <th>Actions</th>
    </tr>
    <?php
    foreach ($data as $d) {
        ?>
        <tr>
            <td><?php echo $d["nom"]; ?></td>
            <td><?php echo $d["nombre"]; ?></td>
            <td><?php echo $d["nombre"]; ?></td>

        </tr>
        <?php
    }
    ?>


</table>

<a href='/pages/beneEtudes.php'>Ajouter au contage</a>


<a href='/pages/beneEtudes.php'>Retour</a>


