<?php
session_start();
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

if (!isset($_SESSION["personne"])) {
    header('Location: pages/connexion.php');
} else {
    header('Location: pages/home.php');
}
exit();
