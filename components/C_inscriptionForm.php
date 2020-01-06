<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

if (isset($_POST["nom"])) {

    $nom = filter_input(INPUT_POST, "nom");
    $prenom = filter_input(INPUT_POST, "prenom");
    $email = filter_input(INPUT_POST, "email");
    $tel = filter_input(INPUT_POST, "tel");
    $password = filter_input(INPUT_POST, "password");

    userInscription($nom, $prenom, $email, $tel, $password);
}

?>
<h1>Formulaire d'inscription</h1>

<form method="post">
    <div><label for="nom">Nom : <input type="text" name="nom" id="nom"
                                       placeholder="ex : Jean" required></label></div>
    <div><label for="prenom">Prenom : <input type="text" name="prenom" id="prenom"
                                             placeholder="ex : Dupont" required></label></div>
    <div><label for="email">E-Mail : <input type="email" name="email" id="email"
                                            placeholder="ex : michu@madame.fr"
                                            onkeyup="this.value=this.value.toLowerCase()"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required></label></div>
    <div><label for="tel">Telephone : <input type="tel" name="tel" id="tel" maxlength="20"
                                             placeholder="ex : 00 00 00 00 00" required></label></div>
    <div><label for="password">Mot De Passe : <input type="password" name="password" id="password"
                                                     placeholder="Votre mot de passe" required></label></div>
    <div>
        <button type="submit">Enregistrer</button>
    </div>
</form>

<a href="/pages/connexion.php">Se Connecter</a>