<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/selectFunctions.php";

$id_especes = filter_input(INPUT_GET, "id_especes");

deleteEspece($id_especes);

header('location: ../components/C_deleteEspece.php');

