<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$nom = filter_input(INPUT_POST, "nom");
$id_especes = filter_input(INPUT_POST, "id_especes");

if (isset($_POST["delEspece"])) {
    deleteEspece($_POST["id_especes"]);
    header('Location: C_especeListe.php');
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


<h3>LISTE ESPCE</h3>
<table>
    <tr>
        <th>Nom</th>
    </tr>
<?php

        $resultat=listeEspece();

    foreach($resultat as $ligne){
        ?>
            <td><?php echo $ligne["nom"]?></td>
            <td>
            <a href="C_modifyEspece.php?id_especes=<?php echo $ligne["id_especes"] ?>">
            </a>
                <form method="post">
                    <input type="hidden" value="<?php echo $ligne['id_especes']?>" name="id_especes">
                    <button name="delEspece" id="id_especes" type="submit"
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
<a href="../pages/addEspece.php">addEspece</a>
<a href="../pages/home.php">Retour</a>

</body>
</html>