<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "../includes/DB/Functions.php";

session_start();
include_once "../includes/sessionFonctions.php";
Security("A");

$id_especes = filter_input(INPUT_GET, "id_especes");

deleteEspece($id_especes);

header('location: /pages/especeListe.php');

