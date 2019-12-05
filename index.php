<?php
session_start();
if (!$_SESSION["auth"]) {
    header('Location: /pages/connexion.php');
} else {
    header('Location: /pages/home.php');
}
exit();
