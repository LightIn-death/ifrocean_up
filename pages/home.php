<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");
var_dump($_SESSION);
if ($_SESSION["personne"]["admin"]) {

    echo "\n tu est admin \n";

    echo "<br><a href='etudeListe.php'>Liste des etudes</a>";
    echo "<br><a href=''>Creer une nouvelle etude</a>";
    echo "<br><a href=''>Gerer la liste des especes</a>";


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


pageFooter();