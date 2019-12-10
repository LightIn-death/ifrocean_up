<?php
include_once "../components/HeaderFooter.php";
$numero = $_GET["id"];
pageHeader("Etudes n° $numero");


include "../components/C_etudeView.php";


pageFooter();
