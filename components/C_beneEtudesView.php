<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";


$id_especes = filter_input(INPUT_GET, "id_especes");
$data = getPlageInstance($id_especes);

?>

<h1>veuillez selectionner une Plage : </h1>


<table>
    <tr>
        <th>Titre</th>
        <th>Selection</th>

    </tr>
    <tr>


        <?php
        var_dump($data);
        foreach ($data as $d) {
            $etudeName = $d['nom'];
            $etudeId = $d['id_etudes'];
            echo "<td>$etudeName</td>";
            echo "<td><td><a href='/pages/beneEtudeView.php?id=$etudeId'>Selectioner</a></td></td></tr>";
        }
        ?>

</table>

<a href='/pages/beneEtudes.php'>Retour</a>


