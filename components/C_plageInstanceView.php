<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");

$id_plages = filter_input(INPUT_GET, "id");
$etude = filter_input(INPUT_GET, "b");


$densiteGlobal = getDensite($id_plages);
$estimGlobal = getEstim($id_plages);
$nombrePartitip = getNombrePartitip($id_plages);
$nombreWorm = getTotalWorms($id_plages);
$densité = getTotalWorms($id_plages)/getSumZoneReshe($id_plages);

?>

<h3>Densité de vers sur la plage : <?php echo $densiteGlobal ?> Vers / M²</h3>
<h3>Nombre de vers estime de vers sur la plage : <?php echo $estimGlobal ?></h3>

<h3>Nombre de participations vers sur la plage : <?php echo $nombrePartitip ?></h3>
<h3>Nombre de vers trouvé sur la plage : <?php echo $nombreWorm ?></h3>

<h3>Densité des espèces </h3>

<h3>Liste Des Especes</h3>
<table>
    <tr>
        <th>Nom</th>
        <th>Nombre</th>
    </tr>
    <?php

//Affiche les especes
    $resultat = getEspecesDensite($id_plages);

    foreach ($resultat as $ligne) {
        ?>
        <td><?php echo $ligne["FK_id_especes"] ?></td>
        <td><?php echo $ligne["nombre"] ?></td>
        </tr>
        <?php
    }

    ?>

</table>


<a href="/pages/etudeView.php?id=<?php echo $etude ?>">retour</a>
