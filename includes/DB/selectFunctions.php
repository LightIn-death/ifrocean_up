<?php

require_once "DB_infos.php";

$pdo = new PDO(DB_INFOS::servername, DB_INFOS::username, DB_INFOS::password, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


function userLogin($email, $password)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM `personnes` WHERE email=:email AND password=:password");
    $query->execute(['email' => $email, 'password' => $password]);
    $row = $query->fetchAll();

    if (empty($row)) {
        msg("Wrong email or password");
    }
    foreach ($row as $r) {
        if ($r["email"] == $email AND $r["password"] == $password) {
            /*Do everything as connected*/
            session_start();
            $personne = [];
            $personne["auth"] = true;
            $personne["id_personnes"] = $r["id_personnes"];
            $personne["nom"] = $r["nom"];
            $personne["prenom"] = $r["prenom"];
            $personne["email"] = $r["email"];
            $personne["password"] = $r["password"];
            if ($r["admin"] == 1) {
                $personne["admin"] = true;
            } else {
                $personne["admin"] = false;
            }
            $_SESSION["personne"] = $personne;

            header('Location: home.php');

        }
    }

}

function userInscription($nom, $prenom, $email, $tel, $password){
    global $pdo;
    $query = $pdo->prepare("INSERT INTO `personnes` (`id_personnes`, `nom`, `prenom`, `email`, `tel`, `password`, `admin`) VALUES (NULL, :nom, :prenom, :email, :tel, :password, '0')");
    $query->execute(['nom' => $nom, 'prenom' => $prenom, 'email' => $email, 'tel' => $tel, 'password' => $password]);
}

function addEspece($nom){
    global $pdo;
    $query = $pdo->prepare("INSERT INTO `especes` (`nom`) VALUES (:nom)");
    $query->execute(['nom' => $nom]);
}

function listeEspece(){
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM `especes`");
    $query->execute();
    $row = $query->fetchAll();
    return $row;
}

function deleteEspece($id_especes){
    global $pdo;
    $query = $pdo->prepare("DELETE FROM `especes` WHERE `id_especes`=:id_especes");
    $query->execute(['id_especes' => $id_especes]);
}

function modifyEspeces($id_especes){
    global $pdo;
    $query = $pdo->prepare("UPDATE `especes` SET `nom`=:nom WHERE id_especes=:id_especes");
    $query->execute(['id_especes' => $id_especes]);
    $result=$query->fetchAll();
}