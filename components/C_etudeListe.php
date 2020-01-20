<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");


?>

<h1>Voici la liste !</h1>
<table class="pure-table pure-table-bordered">

    <tr>

        <th>Nom de L'étude</th>
        <th>Date de creation</th>
        <th>Date de cloture</th>
        <th>Reference</th>
        <th>actions</th>

    </tr>

    <?php
    $data = getEtudeListe();

    foreach ($data as $d) {
        ?>
        <tr class="pure-table-odd">
            <td><?php echo $d["nom"] ?></td>
            <td><?php echo $d["dateDebut"] ?></td>
            <td><?php echo $d["dateFin"] ?></td>
            <td><?php echo $d["reference"] ?></td>


            <td>
                <a href="/pages/etudeView.php?id=<?php echo $d["id_etudes"]; ?>">Voir</a>
            </td>


        </tr>
    <?php } ?>

</table>


<a href="/pages/etudeAdd.php">add</a>
<a href="/pages/home.php">Retour</a>

