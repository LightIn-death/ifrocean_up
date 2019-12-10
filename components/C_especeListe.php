<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

?>
<h3>LISTE ESPCE</h3>

<tr>
    <th>Nom</th>
</tr>
<?php

    $resultat=listeEspece();
    foreach ($resultat as $ligne){

        ?>
        <tr>
            <td><?php echo $ligne["nom"] ?></td>
        </tr>
    <?php
    }
?>

<a href="../pages/addEspece.php">addEspece</a>
