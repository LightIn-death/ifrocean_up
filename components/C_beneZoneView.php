<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("B");


$id_zone = filter_input(INPUT_GET, "z");
$number = filter_input(INPUT_GET, "n");
$etude = filter_input(INPUT_GET, "e");
$plage = filter_input(INPUT_GET, "p");
$data = getZonedetails($id_zone);
$plageName = getPlageInfo(intval($data["FK_instance_plages"]))["nom"];

?>

<h1>Details de la zone n° <?php echo $number; ?> </h1>

<h2>plage associée : <b><?php echo $plageName; ?></b></h2>


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

<h3>Nombre de personnes participants dans la zone : <?php echo $data["nombrePersonne"]; ?></h3>
<a href='/pages/beneZoneUp.php?z=<?php echo $id_zone ?>&n=<?php echo $number ?>&e=<?php echo $etude ?>&p=<?php echo $plage ?>'>Modifier</a>

<?php


if (isset($_POST["supprimerEspece"])) {
    $id_espece = filter_input(INPUT_POST, "id_espece");
    deleteInstEspece($id_espece, $id_zone);
}
if (isset($_POST["AjouterEspece"])) {
    $id_espece = filter_input(INPUT_POST, "espece");
    $nombre = filter_input(INPUT_POST, "nombre");
    addInstEspece($id_espece, $id_zone, $nombre);
}


$data = getInstEspece($id_zone);
//var_dump($data);

?>


<table>
    <tr>
        <th>Espèce</th>
        <th>Nombre</th>
        <th>Actions</th>
    </tr>
    <?php
    foreach ($data as $d) {
        ?>
        <tr>
            <td><?php echo $d["nom"]; ?></td>
            <td><?php echo $d["nombre"]; ?></td>
            <td>

                <form method="post">
                    <input type="hidden" name="id_espece" value="<?php echo $d['FK_id_especes']; ?>">
                    <button class="del" type="submit" name="supprimerEspece">Supprimer</button>
                </form>
            </td>

        </tr>
        <?php
    }
    ?>

    <tr>
        <form method="post">

            <td>
                <select name="espece">

                    <?php
                    $especes = listeEspeceNotUse($id_zone);
                    foreach ($especes as $e) {
                        $especeNom = $e["nom"];
                        $especeId = $e["id_especes"];
                        echo "<option value='$especeId' name='espece'>$especeNom</option>";
                    }
                    ?>


                </select>
            </td>

            <td>
                <input type="number" name="nombre">
            </td>
            <td>
                <button id="short_input" type="submit" name="AjouterEspece">Ajouter au comptage</button>
            </td>
        </form>


    </tr>


</table>


<a href='/pages/beneZoneListe.php?e=<?php echo $etude ?>&p=<?php echo $plage ?>'>Retour</a>




