<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

$nom = filter_input(INPUT_POST, "nom");
$id_especes = filter_input(INPUT_POST, "id_especes");

if (isset($_POST["delEspece"])) {
    deleteEspece($_POST["id_especes"]);
    header('Location: /components/C_especeDel.php');
}


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--BootStrap-->
    <!-- Mettre les deux lignes ci-dessous en premier (sinon ça marche pas)-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/edc8d5fc95.js" crossorigin="anonymous"></script>
</head>


<h3>Liste Des Especes</h3>
<table>
    <tr>
        <th>Nom</th>
        <th>Action</th>
    </tr>
    <?php

    $resultat = listeEspece();

    foreach ($resultat as $ligne) {
        ?>
            <td><?php echo $ligne["nom"]?></td>
            <td class="fix_action">
            <a  href="/pages/especeUp.php?id_especes=<?php echo $ligne['id_especes']?>">Modifier
            </a>
                <form method="post">
                    <input type="hidden" value="<?php echo $ligne['id_especes']?>" name="id_especes">
                    <button class="del" name="delEspece" id="id_especes" type="submit"
                            onclick="return confirm('Etes-vous sûr de vouloir supprimer la plage <?php
                            echo $ligne["nom"]; ?>\nSi oui confirmer !')">supprimer</button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>

</table>
<a href="../pages/especeAdd.php">addEspece</a>
<a href="../pages/home.php">Retour</a>

</body>
</html>