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
    <p><input type="text" name="nom" id="nom"
              placeholder="ex : Jean" required></p>
    <p><input type="text" name="prenom" id="prenom"
              placeholder="ex : Dupont" required></p>
    <p><input type="email" name="email" id="email"
              placeholder="ex : michu@madame.fr" required
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" ></p>
    <p><input type="tel" name="tel" id="tel"
              placeholder="ex : 00 00 00 00 00" required></p>
    <p><input type="password" name="password" id="password"
              placeholder="Votre mot de passe" required></p>
    <button type="submit" >Enregistrer</button>
</form>