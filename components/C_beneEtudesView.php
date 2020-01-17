<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("B");


$id_etude = filter_input(INPUT_GET, "id");
$data = getPlageInstance($id_etude);

?>

<h1>veuillez selectionner une Plage : </h1>


<table>
    <tr>
        <th>Titre</th>
        <th>Selection</th>


    </tr>
    <tr>


        <?php

        foreach ($data as $d) {
            $plageName = $d['nom'];
            $plageId = $d['id_instancePlages'];
            echo "<td>$plageName</td>";
            echo "<td><a href='/pages/beneZoneListe.php?e=$id_etude&p=$plageId'>Selectioner</a></td></tr>";

        }
        ?>

</table>

<a href='/pages/beneEtudes.php'>Retour</a>


