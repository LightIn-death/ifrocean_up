<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";


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
<div class="zone">


    <form method="post">
        <div><label for="nom">Nom : <input type="text" name="nom" id="nom"
                                           pattern="^[^;.,!?/\|<>*$%&£'€¤@~]*$"
                                           placeholder="ex : Jean" required></label></div>
        <div><label for="prenom">Prénom : <input type="text" name="prenom" id="prenom"
                                                 pattern="^[^;.,!?/\|<>*$%&£'€¤@~]*$"
                                                 placeholder="ex : Dupont" required></label></div>
        <div><label for="email">E-Mail : <input type="email" name="email" id="email"
                                                placeholder="ex : michu@madame.fr"
                                                onkeyup="this.value=this.value.toLowerCase()"
                                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" required></label>
        </div>
        <div><label for="tel">Telephone : <input type="tel" name="tel" id="tel" maxlength="14"
                                                 pattern="^0[1-9]([-. ]?[0-9]{2}){4}$"
                                                 placeholder="ex : 07 83 53 07 65" required></label></div>
        <div><label for="password">Mot De Passe : <input type="password" name="password" id="password"
                                                         pattern="^[^ ]{8,}$"
                                                         placeholder="Votre mot de passe" required></label></div>
        <div>
            <button type="submit">Enregistrer</button>
        </div>
    </form>
</div>

<a href="/pages/formConnexion.php">Se Connecter</a>