<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();

include_once "../includes/sessionFonctions.php";
Security("C");


$user_id = $_SESSION["personne"]["id_personnes"];
$user_nom = $_SESSION["personne"]["nom"];
$user_prenom = $_SESSION["personne"]["prenom"];
$user_email = $_SESSION["personne"]["email"];
$user_password = $_SESSION["personne"]["password"];
$user_admin = $_SESSION["personne"]["admin"];

if (isset($_POST["userDeleteAccount"])) {
    userDeleteAccount($user_id);
    session_destroy();
    header('Location: formConnexion');

}
?>

<h1>Informations de votre compte </h1>

<form method="Post">

    <label> Votre nom <input type="text" value="<?php echo $user_nom ?>"></label>
    <label> Votre prénom <input type="text" value="<?php echo $user_prenom ?>"></label>
    <label> Votre email <input type="text" value="<?php echo $user_email ?>"></label>
    <label> Votre mot de passe <input type="text" value="<?php echo $user_password ?>"></label>

    <input type="hidden" value="<?php echo $user_id ?>" name="id_personnes">
        <button class="del" name="userDeleteAccount" id="id_personnes" type="submit"
                onclick="return confirm('Etes-vous sûr de vouloir supprimer votre compte ??')">
            DeleteAccount
        </button>

</form>

<?php
    if ($user_admin == 1){
        ?>
        <label>Votre role<input type="text" value="Vous êtes Admin"></label>
    <?php
    }
    if ($user_admin == 0) {
        ?>
        <label>Votre role<input type="text" value="Vous êtes Bénévol"></label>
        <?php
    }
    ?>

<a href="../pages/home.php">Retour</a>

</body>
</html>
