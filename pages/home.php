<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");

//var_dump($_SESSION);
echo "<div class='nav'>";
echo "<img id='logo' src='/ressources/images/ifroceanLogo.png' alt='logo'>";
echo "<h1>Ifrocean</h1>";
echo "<br><a href='../includes/LogOut.php'>deconexion</a>";
echo " </div > ";
//var_dump($_SESSION);
if ($_SESSION["personne"]["admin"]) {

    echo "\n tu est admin \n";


    echo "<a href = 'etudeListe.php' > Liste des etudes </a > ";
    echo "<br ><a href = 'etudeAdd.php' > Creer une nouvelle etude </a > ";
    echo "<br ><a href = 'especeListe.php' > Gerer la liste des especes </a > ";
    echo "<br ><a href = 'plageListe.php' > Gerer la liste des Plages </a > ";


//
//
//
//
//
//
//
//
//
//
//
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
//
//
//
//
//
//
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