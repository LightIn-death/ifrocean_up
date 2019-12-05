<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");
var_dump($_SESSION);
if ($_SESSION["personne"]["admin"]) {

    echo "\n tu est admin \n";

} else if (!$_SESSION["personne"]["admin"]) {

    echo "\ntu est un benevole \n";

} else {

    header('Location: /pages/connexion.php');
}


?>


    <a href="../includes/LogOut.php">deconexion</a>
<?php


pageFooter();