<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$nom = filter_input(INPUT_POST, "nom");
$id_plages = filter_input(INPUT_POST, "id_plages");

if (isset($_POST["delPlage"])) {
    deletePlage($_POST["id_plages"]);
    header('Location: C_plageListe.php');
}




?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>


<h3>LISTE plage</h3>
<table>
    <tr>
        <th>Nom</th>

        <?php

        $resultat=listePlage();
        foreach ($resultat as $ligne){
        ?>
        <td><?php echo $ligne["nom"]?></td>
        <td><?php echo $ligne["commune"]?></td>
        <td><?php echo $ligne["departement"]."\n"?></td>
        <td>
            <a href="../pages/modifyPlage.php?id_plages=<?php echo $ligne["id_plages"] ?>"
               class="btn btn-primary">
                <i class="fa fa-edit"></i>
            </a>

            <form method="post">
                <input type="hidden" value="<?php echo $ligne['id_plages']?>" name="id_plages">
                <button name="delPlage" id="id_plages" type="submit"
                        onclick="return confirm('Etes-vous sûr de vouloir supprimer la plage <?php
                        echo $ligne["nom"]; ?>\nSi oui confirmer !')">
                    supprimer
                </button>
            </form>
        </td>
    </tr>
    <?php
    }

    ?>
</table>
<a href="../components/C_addPlage.php">addPlage</a>
<a href="../pages/home.php">Retour</a>

</body>
</html>