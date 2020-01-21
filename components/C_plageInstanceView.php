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
if (getSumZoneReshe($id_plages) == 0) {
    $zonR = 1;
} else {
    $zonR = getSumZoneReshe($id_plages);
}
$densité = getTotalWorms($id_plages) / $zonR;

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
        <th>Densité</th>
        <th>nombre estimé</th>
    </tr>
    <?php

    //Affiche les especes
    $resultat = getStatEspPlage($id_plages);
    //    var_dump($resultat);

    foreach ($resultat as $ligne) {
        ?>
        <tr>
            <td><?php echo $ligne["nom"] ?></td>
            <td><?php echo $ligne["nombre"] ?></td>
            <td><?php echo $ligne["dens"] ?></td>
            <td><?php echo $ligne["est"] ?></td>
        </tr>
        <?php
    }

    ?>

</table>


<a href="/pages/etudeView.php?id=<?php echo $etude ?>">retour</a>
