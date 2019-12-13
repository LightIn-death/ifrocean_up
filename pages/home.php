<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");
var_dump($_SESSION);
if ($_SESSION["personne"]["admin"]) {

    echo "\n tu est admin \n";

    echo "<br><a href='../components/C_etudeListe.php'>Liste des etudes</a>";
    echo "<br><a href=''>Creer une nouvelle etude</a>";
    echo "<br><a href='especeListe.php'>Gerer la liste des especes</a>";


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