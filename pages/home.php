<?php
session_start();

include_once "../components/HeaderFooter.php";
include_once "../includes/sessionFonctions.php";
pageHeader("Home");
var_dump($_SESSION);
?>


    <a href="../includes/LogOut.php">deconexion</a>


<?php
pageFooter();