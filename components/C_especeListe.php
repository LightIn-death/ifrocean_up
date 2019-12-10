<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

?>
<h3>LISTE ESPCE</h3>

<tr>
    <th>Nom</th>
    <th>ID</th>
</tr>
<?php


    $resultat=listeEspece();
    foreach ($resultat as $ligne){

        ?>
        <tr>
            <td><?php echo $ligne["nom"] ?></td>
            <td><?php echo $ligne["id_especes"] ?></td>
        </tr>
    <?php
    }
?>

<a href="../pages/addEspece.php">addEspece</a>
