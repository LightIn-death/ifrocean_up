<?php
session_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

if (isset($_SESSION["personne"])) {
    header('Location: /pages/home.php');
}


if (isset($_POST["email"])) {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    userLogin($email, $password);
}

?>

<h3>Se connecter ici !</h3>
<div class="zone">

    <form method="post">

        <label for="email">E-mail :</label>
        <input placeholder="ex : moi@ifrocean.fr" id="email" type="email" name="email"
               onkeyup="this.value=this.value.toLowerCase()"
               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required>


        <label for="password">Password :</label>
        <input id="password" type="password" name="password" pattern=".{8,}">


        <button type="submit" name="action">Envoyer</button>

    </form>
</div>
<a href="/pages/formInscription.php">s'inscrire</a>

