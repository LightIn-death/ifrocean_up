<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/includes/DB/selectFunctions.php";

if (isset($_POST["email"])) {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");

    userLogin($email, $password);

}

?>

<h3>Voici la liste !</h3>

