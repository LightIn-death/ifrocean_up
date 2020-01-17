<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");

if (isset($_POST["UprankAdmin"])) {
    userUprankAdmin($_POST["id_personnes"]);
    header('Location: userList.php');
}

if (isset($_POST["userDeleteAccount"])) {
    userDeleteAccount($_POST["id_personnes"]);
    header('Location: userList.php');
}

?>

<h1>Liste des utilisateurs</h1>
<table>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Téléphone</th>
    </tr>

    <?php

    $resultat = userList();
    foreach ($resultat as $ligne){
        ?>
        <td><?php echo $ligne["nom"] ?></td>
        <td><?php echo $ligne["prenom"] ?></td>
        <td><?php echo $ligne["email"] ?></td>
        <td><?php echo $ligne["tel"] ?></td>

        <td>
            <div class="fix_action">

                <form method="post">
                    <input type="hidden" value="<?php echo $ligne['id_personnes'] ?>" name="id_personnes">
                    <button class="del" name="UprankAdmin" id="id_personnes" type="submit"
                            onclick="return confirm('Etes-vous sûr de vouloir donner les droits administrateurs à <?php echo $ligne["nom"].' '.$ligne["prenom"] ?> ?\nSi oui confirmer !')">
                        -> admin
                    </button>
                </form>
                <form method="post">
                    <input type="hidden" value="<?php echo $ligne['id_personnes'] ?>" name="id_personnes">
                    <button class="del" name="userDeleteAccount" id="id_personnes" type="submit"
                            onclick="return confirm('Etes-vous sûr de vouloir supprimer le compte de <?php echo $ligne["nom"].' '.$ligne["prenom"] ?> ?\nSi oui confirmer !')">
                        DeleteAccount
                    </button>
                </form>
            </div>
        </td>
        </tr>
        <?php
    }

    ?>
</table>
<a href="../pages/home.php">Retour</a>

</body>
</html>