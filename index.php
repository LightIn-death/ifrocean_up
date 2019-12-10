<?php
session_start();
$root=realpath($_SERVER["DOCUMENT_ROOT"]);
if (!$_SESSION["auth"]) {
    header('Location: pages/connexion.php');
} else {
    header('Location: pages/home.php');
}
exit();
