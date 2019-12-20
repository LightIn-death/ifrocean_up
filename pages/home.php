<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");
echo "<div id='layout'>";
echo "<div id='main'>";
var_dump($_SESSION);
echo "<img src='/ressources/images/ifroceanLogo.png' alt='logo'>";
if ($_SESSION["personne"]["admin"]) {

    echo "\n tu est admin \n";


    echo "<br><a href='etudeListe.php'>Liste des etudes</a>";
    echo "<br><a href='etudeADD.php'>Creer une nouvelle etude</a>";
    echo "<br><a href='especeListe.php'>Gerer la liste des especes</a>";
    echo "<br><a href=''>Gerer la liste des Plages</a>";


//
//
//
//
//
//
//²
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
    echo "<br>";

    echo "    <a href='/pages/beneEtudes.php'>Liste des Etudes Ouvertes</a>";

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

    header('Location: pages/connexion.php');
}


?>


    <br><a href="../includes/LogOut.php">deconexion</a>
<?php

echo "</div>";
echo "</div>";
pageFooter();