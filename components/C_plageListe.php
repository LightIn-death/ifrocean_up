<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$nom = filter_input(INPUT_POST, "nom");
$id_plages = filter_input(INPUT_POST, "id_plages");

if (isset($_POST["delPlage"])) {
    deletePlage($_POST["id_plages"]);
    header('Location: plageListe.php');
}


?>

<h1>Liste Plages</h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Ville</th>
        <th>Departement</th>
        <th>Action</th>
    </tr>
    <tr>
        <?php

        $resultat = listePlage();
        foreach ($resultat

        as $ligne){
        ?>
        <td><?php echo $ligne["nom"] ?></td>
        <td><?php echo $ligne["commune"] ?></td>
        <td><?php echo $ligne["departement"] . "\n" ?></td>
        <td>
            <a href="../pages/modifyPlage.php?id_plages=<?php echo $ligne["id_plages"] ?>">Edit</a>

            <form method="post">
                <input type="hidden" value="<?php echo $ligne['id_plages'] ?>" name="id_plages">
                <button class="del" name="delPlage" id="id_plages" type="submit"
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