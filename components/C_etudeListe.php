<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/includes/DB/selectFunctions.php";


?>

<h1>Voici la liste !</h1>
<table>

    <tr>
        <th scope="col">Nom de L'etude</th>
        <th scope="col">Date de creation</th>
        <th scope="col">Date de cloture</th>
        <th scope="col">Reference</th>
        <th scope="col">actions</th>

    </tr>


    <?php
    $data = getEtudeListe();

    foreach ($data as $d) {
        ?>
        <tr>
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


<a href="/pages/etudeADD.php">add</a>
<a href="/pages/home.php">Retour</a>

