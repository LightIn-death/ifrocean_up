<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");

//var_dump($_SESSION);
echo "<div class='nav'>";
echo "<img id='logo' src='/ressources/images/ifroceanLogo.png' alt='logo'>";
echo "<h1>Ifrocean</h1>";
echo "<br><a href='../includes/LogOut.php'>déconnexion</a>";
echo "<br ><a href = 'userAccount.php' > Compte </a > ";
echo " </div > ";
//var_dump($_SESSION);
if ($_SESSION["personne"]["admin"]) {

    echo "\n tu est admin \n";


    echo "<a href = 'etudeListe.php' > Liste des etudes </a > ";
    echo "<br ><a href = 'etudeAdd.php' > Créer une nouvelle etude </a > ";
    echo "<br ><a href = 'especeListe.php' > Gérer la liste des espèces </a > ";
    echo "<br ><a href = 'plageListe.php' > Gérer la liste des Plages </a > ";
    echo "<br ><a href = 'userList.php' > Gérer la liste des utilisateurs </a > ";


//
//
//
//


} else if (!$_SESSION["personne"]["admin"]) {

    echo "\ntu est un benevole \n";

    echo " <a href ='/pages/beneEtudes.php'> Liste des Etudes Ouvertes </a>";

//
//
//
//


} else {

    header('Location: pages/formConnexion.php');
}


?>


<?php


pageFooter();