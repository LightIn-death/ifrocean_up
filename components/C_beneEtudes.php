<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("B");

$data = getOpenEtudes();

?>

<h1>veuillez selectionner une etude : </h1>


<table>
    <tr>
        <th>Titre</th>
        <th>Selection</th>

    </tr>
    <tr>


        <?php

        foreach ($data as $d) {
            $etudeName = $d['nom'];
            $etudeId = $d['id_etudes'];
            echo "<td>$etudeName</td>";
            echo "<td><a href='/pages/beneEtudeView.php?id=$etudeId'>Selectioner</a></td></tr>";
        }
        ?>

</table>

<a href='/pages/home.php'>Retour</a>


